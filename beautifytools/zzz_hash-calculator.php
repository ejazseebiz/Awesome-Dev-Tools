

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/hash_calculator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




        
        <div class="row">
        	<div class="col-md-12">
            	<p>Online Hash Calculator calculates the hash of a string using various algorithms. Calculate the hash of a string using Online Hash Calculator. To calculate hash it uses various algorithms like md2, md4, md5, sha1, sha224, sha256, sha384, sha512, ripemd128, ripemd160, ripemd256, ripemd320, whirlpool, tiger128,3, tiger160,3, tiger192,3, tiger128,4, tiger160,4, tiger192,4, snefru, snefru256, gost, gost-crypto, adler32, crc32, crc32b, fnv132, fnv1a32, fnv164, fnv1a64, joaat, haval128,3, haval160,3, haval192,3, haval224,3, haval256,3, haval128,4, haval160,4, haval192,4, haval224,4, haval256,4, haval128,5, haval160,5, haval192,5, haval224,5, haval256,5.</p>
                <div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="data" name="data"></textarea>
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <select id="format" name="format" class="form-control">
                              <option value="">select algorithm</option><option value="md2">md2</option><option value="md4">md4</option><option value="md5">md5</option><option value="sha1">sha1</option><option value="sha224">sha224</option><option value="sha256">sha256</option><option value="sha384">sha384</option><option value="sha512">sha512</option><option value="ripemd128">ripemd128</option><option value="ripemd160">ripemd160</option><option value="ripemd256">ripemd256</option><option value="ripemd320">ripemd320</option><option value="whirlpool">whirlpool</option><option value="tiger128,3">tiger128,3</option><option value="tiger160,3">tiger160,3</option><option value="tiger192,3">tiger192,3</option><option value="tiger128,4">tiger128,4</option><option value="tiger160,4">tiger160,4</option><option value="tiger192,4">tiger192,4</option><option value="snefru">snefru</option><option value="snefru256">snefru256</option><option value="gost">gost</option><option value="gost-crypto">gost-crypto</option><option value="adler32">adler32</option><option value="crc32">crc32</option><option value="crc32b">crc32b</option><option value="fnv132">fnv132</option><option value="fnv1a32">fnv1a32</option><option value="fnv164">fnv164</option><option value="fnv1a64">fnv1a64</option><option value="joaat">joaat</option><option value="haval128,3">haval128,3</option><option value="haval160,3">haval160,3</option><option value="haval192,3">haval192,3</option><option value="haval224,3">haval224,3</option><option value="haval256,3">haval256,3</option><option value="haval128,4">haval128,4</option><option value="haval160,4">haval160,4</option><option value="haval192,4">haval192,4</option><option value="haval224,4">haval224,4</option><option value="haval256,4">haval256,4</option><option value="haval128,5">haval128,5</option><option value="haval160,5">haval160,5</option><option value="haval192,5">haval192,5</option><option value="haval224,5">haval224,5</option><option value="haval256,5">haval256,5</option>                            </select>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="calculate_hash" name="calculate_hash" class="btn btn-success">Calculate&nbsp;Hash</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <div class="well well-sm out_div" style="display:none;">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="out" name="out"></textarea>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
            </div>
        </div>
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/hash_calculator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


