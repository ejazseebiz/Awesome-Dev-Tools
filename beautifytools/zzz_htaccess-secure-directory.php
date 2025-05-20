

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/htaccess_secure_directory.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>



        
        <div class="row">
        	<div class="col-md-12">
            	<p>Protect one or multiple directory using .htaccess. htaccess secure directory tool generates necessary code for .htaccess and .htpasswd files to protect a directory. htaccess secure directory tool generates code for the .htpasswd and .htaccess files to protect a directory.</p>
                <div class="well well-sm">
                	<form class="form-horizontal">
                    	<fieldset>
                            <div class="form-group">
                              <label class="control-label" for="uname"></label>  
                              <div class="col-md-12">
                              <input id="uname" name="uname" placeholder="Enter username" class="form-control input-md" type="text">
                                
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="control-label" for="pass"></label>
                              <div class="col-md-12">
                                <input id="pass" name="pass" placeholder="Enter password" class="form-control input-md" type="password">
                                
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="control-label" for="path"></label>  
                              <div class="col-md-12">
                              <input id="path" name="path" placeholder="Path to .htpasswd file" class="form-control input-md" type="text">
                              <span class="help-block">Path to .htpasswd file relative to the root directory of your server (e.g. /home/your_site/protected/.htpasswd)</span>  
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-12">
                                <button id="generate" name="generate" class="btn btn-success">Generate</button>
                                <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                              </div>
                            </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:15px;" src="img/loader.gif" alt="loading" class="l_img"/>
            	<div class="well well-sm results" style="text-align:left;display:none;">
                	<strong>.htpasswd file code:</strong><br/><br/>
                    <pre><span id="uname_code"></span>:<span id="crypt_pass"></span></pre><br/>
                    <strong>.htaccess file code:</strong><br/><br/>
                    <pre>AuthType Basic
AuthName "Password Protected Area"
AuthUserFile <span id="path_to_pass"></span>
Require valid-user</pre>
                </div>
                <div>
                	<p>Enter username, password and path to the .htpasswd file. The path should be relative to the root directory of your server. Click generate to generate .htpasswd and .htaccess code. The htaccess secure directory tool will generate code for both .htpasswd and .htaccess files. Create those files and copy paste the code in the files. Then upload the .htaccess file in those directories which you want to protect. Upload the .htpasswd file in a directory as you mentioned in the .htpasswd path input. And finally, visit the directory to check if it is working.</p>
                </div>
            </div>
        </div>
    
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/htaccess_secure_directory.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


