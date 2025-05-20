


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/anytime.5.1.2.min.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/qr_code_generator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>QR Code Generator generates QR code for various QR code data types such as VCARD, MAILTO, VEVENT, GEO, Text, SMSTO, TEL, URL and WiFi. Generate QR code using QR Code Generator. Our QR Code Generator supports various QR code data types such as VCARD, MAILTO, VEVENT, GEO, Text, SMSTO, TEL, URL and WiFi.</p>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
                <div class="well well-sm">
                	<form>
                    <fieldset>
                    
                    <div class="alert alert-success" style="color:#000;">
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="qr-code-type">QR Code Type</label>
                      	<select id="qr-code-type" name="qr-code-type" class="form-control">
                          <option value="address-book">Address Book (VCARD)</option>
                          <option value="email">Email (MAILTO)</option>
                          <option value="event">Event (VEVENT)</option>
                          <option value="geo">Geo Coordinates (GEO)</option>
                          <option value="text">Plain Text</option>
                          <option value="sms">SMS (SMSTO)</option>
                          <option value="tel">Telephone (TEL)</option>
                          <option value="url">URL</option>
                          <option value="wifi">WiFi</option>
                        </select>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="error">Error Correction</label>
                      	<select id="error" name="error" class="form-control">
                          <option value="L">Low (7%)</option>
                          <option value="M">Medium (15%)</option>
                          <option value="Q" selected>Quartile (25%)</option>
                          <option value="H">High (30%)</option>
                        </select>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="pixel_size">Pixel Size</label>
                      
                        <select id="pixel_size" name="pixel_size" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3" selected>3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="frame_size">Frame Size</label>
                      
                        <select id="frame_size" name="frame_size" class="form-control">
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                    </div>
                    
                    </div>
                    
                    <div type_id="address-book">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name"><span style="color:red;">*</span>Name</label>  
                      
                      <input id="name" name="name" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="company">Company</label>  
                      
                      <input id="company" name="company" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="occupation">Occupation</label>  
                      
                      <input id="occupation" name="occupation" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="telephone_add">Telephone</label>  
                      
                      <input id="telephone_add" name="telephone_add" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="email_add">Email</label>  
                      
                      <input id="email_add" name="email_add" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="address">Address</label>  
                      
                      <input id="address" name="address" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="website-url">Website Url</label>  
                      
                      <input id="website-url" name="website-url" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="note">Note</label>  
                      
                      <input id="note" name="note" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="email">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="email_email"><span style="color:red;">*</span>Email</label>  
                      
                      <input id="email_email" name="email_email" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="event">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="title"><span style="color:red;">*</span>Title</label>  
                      
                      <input id="title" name="title" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="location"><span style="color:red;">*</span>Location</label>  
                      
                      <input id="location" name="location" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="description">Description</label>  
                      
                      <input id="description" name="description" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="start-date"><span style="color:red;">*</span>Start Date</label>  
                      
                      <input id="start-date" name="start-date" type="text" placeholder="" class="form-control input-md" readonly style="background-color:#FFF;">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="end-date"><span style="color:red;">*</span>End Date</label>  
                      
                      <input id="end-date" name="end-date" type="text" placeholder="" class="form-control input-md" style="background-color:#FFF;" readonly>
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="geo">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="latitude"><span style="color:red;">*</span>Latitude (Ex: 37.160317)</label>  
                      
                      <input id="latitude" name="latitude" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="longitude"><span style="color:red;">*</span>Longitude (Ex: 49.39453)</label>  
                      
                      <input id="longitude" name="longitude" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="queryString">Query String</label>  
                      
                      <input id="queryString" name="queryString" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="text">
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label for="text"><span style="color:red;">*</span>Text</label>
                                           
                        <textarea class="form-control" id="text" name="text"></textarea>
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="sms">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="telephone_sms"><span style="color:red;">*</span>Telephone</label>  
                      
                      <input id="telephone_sms" name="telephone_sms" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label for="message"><span style="color:red;">*</span>Message</label>
                                           
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="tel">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="telephone_tel"><span style="color:red;">*</span>Telephone</label>  
                      
                      <input id="telephone_tel" name="telephone_tel" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="url">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="url"><span style="color:red;">*</span>URL</label>  
                      
                      <input id="url" name="url" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    </div>
                    
                    <div style="display:none;" type_id="wifi">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="ssid"><span style="color:red;">*</span>SSID (Network Id)</label>  
                      
                      <input id="ssid" name="ssid" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="password">Password</label>  
                      
                      <input id="password" name="password" type="text" placeholder="" class="form-control input-md">
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="networkType">Network Type</label>
                      
         				<select id="networkType" name="networkType" class="form-control">
                          <option value="WEP">WEP</option>
                          <option value="WPA/WPA2">WPA/WPA2</option>
                          <option value="nopass">Not secured</option>
                        </select>
                    </div>
                    
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group text-center">
                      <div class="col-md-12">
                        <button id="generate" name="generate" class="btn btn-primary">Generate QR Code</button>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="well well-sm">
                	<img class="img-thumbnail" src="img/temp-qr-image.png" alt="qr image" id="qr-image"/><br/><br/>
                    <a href="img/temp-qr-image.png" id="download" class="btn btn-primary" download>Download</a>
                </div>
            </div>
        </div>
            </div>


<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/anytime.5.1.2.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/anytimetz.5.1.2.js"></script>
<script src="<?php echo $plug_fl; ?>js/date.js"></script>
<script src="<?php echo $plug_fl; ?>js/qr_code_generator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


