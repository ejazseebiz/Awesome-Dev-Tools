

<?php
	ob_start();
	gc_enable();

	require "libs/simple_html_dom.php";

	set_time_limit(3600);


	function parse_url_new($url) {
		$arr = parse_url($url);

		if(!isset($arr['path'])) $arr['path'] = '';
		if(!isset($arr['query'])) $arr['query'] = '';
		if(!isset($arr['host'])) $arr['host'] = '';
		if(!isset($arr['scheme'])) $arr['scheme'] = '';

		return $arr;
	}

    function isSameWebsite($page, $website) {
        // check if $page is on the $website
        
        if(substr($page, 0, 2) == "//") {
            if(strpos($page, $website['host']) !== false) return true;
            return false;
        }
        if(substr($page, 0, 7) == "http://") {
            if(strpos($page, $website['host']) !== false) return true;
            return false;
        }
        if(substr($page, 0, 8) == "https://") {
            if(strpos($page, $website['host']) !== false) return true;
            return false;
        }
        
        return true;
    }

	function rel2abs($rel, $base)
	{
	    /* return if already absolute URL */
	    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;

	    /* queries and anchors */
	    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;

	    /* parse base URL and convert to local variables:
	       $scheme, $host, $path */
	    extract(parse_url_new($base));

	    /* remove non-directory element from path */
	    $path = preg_replace('#/[^/]*$#', '', $path);

	    /* destroy path if relative url points to root */
	    if ($rel[0] == '/') $path = '';

	    /* dirty absolute URL // with port number if exists */
	    if (parse_url($base, PHP_URL_PORT) != ''){
	        $abs = "$host:".parse_url($base, PHP_URL_PORT)."$path/$rel";
	    }else{
	        $abs = "$host$path/$rel";
	    }
	    /* replace '//' or '/./' or '/foo/../' with '/' */
	    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
	    for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}

	    /* absolute URL is ready! */
	    return $scheme.'://'.$abs;
	}

	$done = array();
	$queue = array();
	
	if(isset($_POST['go'])) {
		$url = $_POST['url'];
		$properUrl = $url;

		$purl = parse_url_new($url);
		$phref = $purl['scheme'] . "://" . $purl['host'] . $purl['path'];

		if(substr($phref, -1) !== "/") {
			$phref .= "/";
		}
        
        $tpurl = $purl;
        $tpurl['host'] = str_replace("www.", "", $tpurl['host']);

		$properUrl = $phref;
		
		$freq = $_POST['frequency'];
		$priority = $_POST['priority'];

		function GetUrl($url)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}

		function Scan($url, $level = 1) {
			global $scanned, $pf, $extension, $skip, $freq, $priority, $done, $properUrl, $queue, $tpurl;

			sleep($_POST['speed']);

			$purl = parse_url_new($url);
			$phref = $purl['scheme'] . "://" . $purl['host'] . $purl['path'];
			if($purl['query'] != "") $phref .= "?" . $purl['query'];

			if(!in_array($phref, $scanned)) {
				$scanned[] = $phref;

				$html = GetUrl($url);
				$dom = str_get_html($html);

				if(!$dom) return;

				$anchors = $dom->find("a");
                
                $futurescans = array();

				foreach ($anchors as $a) {
					$href = $a->href;

					if($href) {
						$canPost = false;

				        $preservedHref = $href;
						if(substr($href, 0, 7) != "http://" && substr($href, 0, 8) != "https://" && substr($href, 0, 2) != "//") {
                            $href = rel2abs($href, $properUrl); 
						}
					
						if($_POST['priority'] == "auto") {
							$priority = 1 - (0.01 * $level);
						}

						$purl = parse_url_new($href);
						$phref = $purl['scheme'] . "://" . $purl['host'] . $purl['path'];
						if($purl['query'] != "") $phref .= "?" . $purl['query'];

						if(substr($phref, 0, 11) !== "javascript:" && substr($phref, 0, 1) !== "#" && isSameWebsite($preservedHref, $tpurl)) {
							if(!in_array(str_replace("/", "", $phref), $done)) {
								$done[] = str_replace("/", "", $phref);

								echo "	<url>\n		<loc>$phref</loc>\n" .
								"		<changefreq>$freq</changefreq>\n" .
								"		<priority>$priority</priority>\n	</url>\n";
								
                                $futurescans[] = array($phref, $level+1);
							}
						}
					}
				}
                
                foreach($futurescans as $scan) {
                    Scan ($scan[0], $scan[1]);
                }
                
                unset($futurescans);
				unset($html);
				unset($dom);
			}
		}

$done[] = str_replace("/", "", $properUrl);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
	xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
	xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
	http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

	<url>
		<loc>$properUrl</loc>
		<changefreq>daily</changefreq>
		<priority>1</priority>
	</url>\n";

			$scanned = array();
			Scan ($url);
			
			echo "</urlset>\n";
	}
	
	$fileName = $_POST['fname'];
	
	header('Content-type: text/xml');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header("Pragma: public");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
?>
