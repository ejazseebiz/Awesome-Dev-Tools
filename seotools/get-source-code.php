<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
	include("functions.php");
//	$url = $application->getInput('url');
if (isset($_POST["doFormPostback"])) {
	$url = $_REQUEST['url'];
    // echo $url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 150);
	$data = curl_exec_follow($ch);
	curl_close($ch);

	// HTML Colorizer class. Thanks Daniel @ PHP.NET! //

	class HTMLcolorizer{
		private $pointer = 0; //Cursor position.
		private $content = null; //content of document.
		private $colorized = null;
		function __construct($content){
			$this->content = $content;
		}
		function colorComment($position){
			$buffer = "&lt;<span class='HTMLComment'>";
			for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
				$buffer.= $this->content[$position];
			}
			$buffer .= "</span>&gt;";
			$this->colorized .= $buffer;
			return $position;
		}
		function colorTag($position){
			$buffer = "&lt;<span class='tagName'>";
			$coloredTagName = false;
			//As long as we're in the tag scope
			for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
				if($this->content[$position] == " " && !$coloredTagName){
					$coloredTagName = true;
					$buffer.="</span>";
				}else if($this->content[$position] != " " && $coloredTagName){
					//Expect attribute
					$attribute = "";
					//While we're in the tag
					for(;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
						if($this->content[$position] != "="){
							$attribute .= $this->content[$position];
						}else{
							$value="";
							$buffer .= "<span class='tagAttribute'>".$attribute."</span>=";
							$attribute = ""; //initialize it
							$inQuote = false;
							$QuoteType = null;
							for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" && $this->content[$position] != " "  ;$position++){
								if($this->content[$position] == '"' || $this->content[$position] == "'"){
									$inQuote = true;
									$QuoteType = $this->content[$position];
									$value.=$QuoteType;
									//Read Until next quotation mark.
									for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" && $this->content[$position] != $QuoteType  ;$position++){
										$value .= $this->content[$position];
									}
									$value.=$QuoteType;
								}else{//No Quotation marks.
									$value .= $this->content[$position];
								}
							}
							$buffer .= "<span class='tagValue'>".$value."</span>";
							break;
						}

					}
					if($attribute != ""){$buffer.="<span class='tagAttribute'>".$attribute."</span>";}
				}
				if($this->content[$position] == ">" ){break;}else{$buffer.= $this->content[$position];}

			}
			//In case there were no attributes.
			if($this->content[$position] == ">" && !$coloredTagName){
				$buffer.="</span>&gt;";
				$position++;
			}
			$this->colorized .= $buffer;
			return --$position;
		}
		function colorize(){
			$this->colorized="";
			$inTag = false;
			for($pointer = 0;$pointer<strlen($this->content);$pointer++){
				$thisChar = $this->content[$pointer];
				$nextChar = substr($this->content, $pointer+1, 1);
				if($thisChar == "<"){
					if($nextChar == "!"){
						$pointer = $this->colorComment($pointer);
					}else if($nextChar == "?"){
						//colorPHP();
					}else{
						$pointer = $this->colorTag($pointer);
					}
				}else{
					$this->colorized .= $this->content[$pointer];
				}
			}
			return $this->colorized;
		}
	}
	
	// End Colorizer Class //
	
	$contents = $data;
	
	$HTMLinspector = new HTMLcolorizer($contents);
	$contents = $HTMLinspector->colorize();
}
?>

<?php
	if (!isset($_POST["doFormPostback"])) {
?>
<div class="card">
<div class="row">
    <div class="col-md-12">

        <form action="" method="POST" style="padding-top: 10px;">
            <input type="hidden" name="doFormPostback" value="abc">

            <div class="input-group">
                <input type="text" name="url" class="form-control input-lg input-block placeholder" value="https://www.google.com/">

                <span class="input-group-btn" style="margin-top:16px; display:inline-block;">
								<button type="submit" class="btn btn-success btn-lg">Continue</button>
							</span>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div style="padding: 15px;">

        </div>
    </div>
</div>
				</div>
<?php } else { ?>
<style type="text/css">
	.tagName {color:purple;}
	.tagAttribute {color:red;}
	.tagValue {color:blue;}
	.HTMLComment {font-style:italic;color:green;}
</style>

<div class="card">

		<div class="container">
			<div style="overflow-y: auto; max-height: 500px;">
				<pre style="font-size: 11px;"><?=$contents;?></pre>
			</div>

        </div>
</div>
<?php
			 } 
?>