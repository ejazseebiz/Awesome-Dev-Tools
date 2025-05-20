
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/htaccess_secure_files.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        <div class="row">
        	<div class="col-md-12">
            	<p>Protect one or multiple files using .htaccess. Generate necessary code for .htaccess and .htpasswd files to protect one or more files using htaccess secure files tool. htaccess secure files tool generates code for the .htpasswd and .htaccess files to protect one or more files.</p>
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
                              <div class="col-md-12">
                              <input id="path" name="path" placeholder="Path to .htpasswd file" class="form-control input-md" type="text">
                              <span class="help-block">Path to .htpasswd file relative to the root directory of your server (e.g. /home/your_site/protected/.htpasswd)</span>  
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-12">
                              <input id="files" name="files" placeholder="Comma separated files" class="form-control input-md" type="text">
                              <span class="help-block">Enter comma separated file names that you want to protect. (e.g. file1.php, file2.jpg)</span>  
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
                    <pre>&lt;FilesMatch &quot;<span id="files_code"></span>&quot;&gt
    AuthName &quot;Member Only&quot; 
    AuthType Basic 
    AuthUserFile <span id="path_to_pass"></span>
    require valid-user 
&lt;/FilesMatch&gt;</pre>
                </div>
                <div>
                	<p>Enter username, password, path to the .htpasswd file and comma separated file names that you want to protect. The .htpasswd file path should be relative to the root directory of your server. Click generate to generate .htpasswd and .htaccess code. The htaccess secure files tool will generate code for both .htpasswd and .htaccess files. Create those files and copy paste the code in the files. Then upload the .htaccess file in a directory where the files you want to protect are exist. Upload the .htpasswd file in a directory as you mentioned in the .htpasswd path input. And finally, visit the files to check if it is working.</p>
                </div>
            </div>
        </div>
           
    
<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/htaccess_secure_files.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


