<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$imageURL="";
// require_once('phplibs/class-php-ico.php');


?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/favicon_generator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

 
<div class="card">
        	<div class="card-body">
            	<p>Generate and download a favicon ico from an image using Favicon Generator. It also lets you choose a custom favicon size.</p>
                <div class="well well-sm">
                	<p class="info text-center text-danger"></p>
                	<form class="form-horizontal favicon_form" enctype="multipart/form-data" action="#" method="post">
                    <fieldset>
                    <!-- Select Basic -->
                    
                    <div class="form-group">
                    
                      <label class="col-md-3 control-label" for="size">
                        Icon Size
                      </label>
                     
                      <div class="col-md-9">
                        <select id="size" name="size" class="form-control">
                          <option value="16">16px</option>
                          <option value="24">24px</option>
                          <option value="32">32px</option>
                          <option value="48">48px</option>
                          <option value="64">64px</option>
                        </select>
                      </div>
                    </div>
                    
                    <!-- File Button --> 
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="icon">Select Image</label>
                      <div class="col-md-9">
                        <input id="icon" name="icon" class="input-file" type="file">
                        <span class="help-block">Please select a JPG, PNG or GIF image. Max file size 2mb.</span>
                      </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="create"></label>
                      <div class="col-md-4">
                        <button id="create"  name="create" class="btn btn-primary">Create Icon</button>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form>
                </div>
                            </div>
        </div>


        <?php if(isset($_POST['size'])): ?>
          <?php
            require(dirname( __FILE__ ) . '/phplibs/class-php-ico.php' );
  
           
            $targetDir = "upload/";
            $fileName = basename($_FILES["icon"]["name"]);
            $targetFilePath =  dirname( __FILE__ )."/".$targetDir.$fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
          
          
          if(!empty($_FILES["icon"]["name"])) {
            $file_info = @getimagesize($_FILES["icon"]["tmp_name"]);
          }


          // if(isset($_POST['submit']) && !empty($_FILES["file"]["name"]) && strlen($fileName) <= 32){
            if($_FILES['icon']['size'] >= 1 || $_FILES['icon']['size'] < 16000000) {
              echo "Step 1";
              if($file_info[0] >= 64) {
                echo "Step 12";
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  echo "Step 3";
                  if(move_uploaded_file($_FILES["icon"]["tmp_name"], $targetFilePath)){
                    echo "Step 4";
                    $source = dirname( __FILE__ ) . "/upload/" . $fileName;
                    $destination = dirname( __FILE__ ) . "/favicon/" . substr($fileName, 0, -4) . '.ico';
                    
                    $ico_lib = new PHP_ICO( $source, array( array( 32, 32 ), array( 64, 64 ) ) );
          
                    // $ico_lib->add_image( dirname( __FILE__ ) . "/upload" . $fileName, array( array( 16, 16 ), array( 24, 24 ), array( 32, 32 ) ) );
                    // $ico_lib->add_image( dirname( __FILE__ ) . "/upload" . $fileName, array( array( 48, 48 ), array( 96, 96 ) ) );
                    // $ico_lib->add_image( dirname( __FILE__ ) . "/upload" . $fileName, array( array( 128, 128 ) ) );
                    
                    $ico_lib->save_ico( $destination);

                    $imageURL = $destination;
                    echo "Test" . $destination;
                     echo $plug_dr;
                     echo $plug_fl;
                  }
                  else {
                    echo "Else S 4";
                  }
                }     else {
                  echo "Else S 3";
                }
              }     else {
                echo "Else S 2";
              }
            }     else {
              echo "Else S 1";
            }
          // }


?>
          
        <?php endif ?>



        <img src="<?php echo $imageURL; ?>" alt="" style="width: 200px; height: 200px;" />

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/favicon_generator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


