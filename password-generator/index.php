<?php
require_once('inc/config.php');

require_once('lang/'.$pgen_config_language.'.php');

require_once('class/class.passwordgenerator.php');

$pgen_obj = new passwordgenerator(); // é

$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

?>
<!-- GOOGLE WEB FONTS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

<!-- CSS TEMPLATE -->
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/passwordgenerator.css">

<!-- RESPONSIVE CSS TEMPLATE CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/responsive.css">



<div class="pgen-container">

    <div class="pgen-form-container">

        <!-- YOUR LOGO HERE -->
        <div class="pgen-header">
            <img src="<?php echo $plug_fl; ?>img/logo.png" class="pgen-logo" />
        </div>


        <div class="pgen-options">

            <h2><?php echo $pgen_lang_chooseoptions;?></h2>

            <?php
			
			$pgen_html_checked_attribute = ' checked="checked" '; 
			
			$pgen_check_pwd_number   = $pgen_check_pwd_lowercase 
													= $pgen_check_pwd_uppercase 
													= $pgen_check_pwd_special 
													= $pgen_check_pwd_similar 
													= '';
			
			
			
			
			$pgen_check_pwd_number = $pgen_preselect_pwd_number ? $pgen_html_checked_attribute: '';
				
			$pgen_check_pwd_lowercase = $pgen_preselect_pwd_lowercase ? $pgen_html_checked_attribute : '';
				
			$pgen_check_pwd_uppercase = $pgen_preselect_pwd_uppercase ? $pgen_html_checked_attribute : '';
				
			$pgen_check_pwd_special = $pgen_preselect_pwd_special ? $pgen_html_checked_attribute : '';
						
			$pgen_check_pwd_similar = $pgen_preselect_pwd_similar ? $pgen_html_checked_attribute : '';
			?>


            <!-- PASSWORD OPTION: INCLUDE NUMBERS -->
            <div class="pgen-password-option">
                <input <?php echo ($pgen_check_pwd_number ? $pgen_check_pwd_number : '');?> type="checkbox" name="pgen_pwd_options[]" id="pgen_pwd_number" value="pwd_number" class="pgen_pwdoption" />&nbsp;

                <label for="pgen_pwd_number" class="pgen_pwdoption"><span class="pgen-label-title <?php echo ($pgen_check_pwd_number ? 'pgen-label-selected' : '');?>"><?php echo $pgen_lang_includeNumbers;?></span>

                    <span class="pgen-bracket">[</span> <span class="pgen-character-list">0 1 2 3 4 5 6 7 8 9</span>

                    <span class="pgen-bracket">]</span>

                </label>

            </div>


            <!-- PASSWORD OPTION: INCLUDE LOWERCASE LETTERS -->
            <div class="pgen-password-option">
                <input <?php echo ($pgen_check_pwd_lowercase ? $pgen_check_pwd_lowercase : '');?> type="checkbox" name="pgen_pwd_options[]" id="pgen_pwd_lowercase" value="pwd_lowercase" class="pgen_pwdoption" />&nbsp;

                <label for="pgen_pwd_lowercase" class="pgen_pwdoption"><span class="pgen-label-title <?php echo ($pgen_check_pwd_lowercase ? 'pgen-label-selected' : '');?>"><?php echo $pgen_lang_includeLowercaseLetters;?></span>

                    <span class="pgen-bracket">[</span>

                    <span class="pgen-character-list">a b c d e f g h ... x y z</span>

                    <span class="pgen-bracket">]</span>

                </label>

            </div>


            <!-- PASSWORD OPTION: INCLUDE UPPERCASE LETTERS -->
            <div class="pgen-password-option">
                <input <?php echo ($pgen_check_pwd_uppercase ? $pgen_check_pwd_uppercase : '');?> type="checkbox" name="pgen_pwd_options[]" id="pgen_pwd_uppercase" value="pwd_uppercase" class="pgen_pwdoption" />&nbsp;

                <label for="pgen_pwd_uppercase" class="pgen_pwdoption"><span class="pgen-label-title <?php echo ($pgen_check_pwd_uppercase ? 'pgen-label-selected' : '');?>"><?php echo $pgen_lang_includeUppercaseLetters;?></span>

                    <span class="pgen-bracket">[</span>

                    <span class="pgen-character-list">A B C D E F G H ... X Y Z</span>

                    <span class="pgen-bracket">]</span>

                </label>

            </div>


            <!-- PASSWORD OPTION: INCLUDE SPECIAL CHARACTERS -->
            <div class="pgen-password-option">

                <input <?php echo ($pgen_check_pwd_special ? $pgen_check_pwd_special : '');?> type="checkbox" name="pgen_pwd_options[]" id="pgen_pwd_specialcharacters" value="pwd_special" class="pgen_pwdoption" />&nbsp;

                <label for="pgen_pwd_specialcharacters" class="pgen_pwdoption"><span class="pgen-label-title <?php echo ($pgen_check_pwd_special ? 'pgen-label-selected' : '');?>"><?php echo $pgen_lang_includeSymbols;?></span>

                    <span class="pgen-bracket">[</span> <span class="pgen-character-list"><?php foreach($pgen_specialcharacter_list as $pgen_specialcharacter_list_value) echo $pgen_specialcharacter_list_value.' ';?></span>

                    <span class="pgen-bracket">]</span>

                </label>

            </div>


            <!-- PASSWORD OPTION: SPECIAL CHARACTERS LIST -->
            <?php
			if($pgen_preselect_pwd_special){
				$pgen_css_display_specialcharacterslist_container = '; display:block; ';
			} else{
				$pgen_css_display_specialcharacterslist_container = '; display:none; ';
			}
			?>


            <div id="pgen-specialcharacterslist-container" style=" <?php echo $pgen_css_display_specialcharacterslist_container;?>">
                <?php
				$pgen_specialcharacter_i = 0;
				
				foreach($pgen_specialcharacter_list as $pgen_specialcharacter_list_value)
				{
					$pgen_specialcharacter_i++;
                        
					if(in_array($pgen_specialcharacter_list_value, $pgen_specialcharacter_list)){
						$pgen_attr_checked_specialcharacter = ' checked="checked" ';
					} else{
						$pgen_attr_checked_specialcharacter = '';
					}
					?>
                <div class="pgen-specialcharacter-container">
                    <input type="checkbox" value="<?php echo htmlentities($pgen_specialcharacter_list_value, ENT_QUOTES, 'UTF-8');?>" name="pgen_specialcharacter[]" id="pgen_<?php echo 'pwd_special_'.$pgen_specialcharacter_i;?>" <?php echo $pgen_attr_checked_specialcharacter;?> class="pgen-checkbox-specialcharacter" />&nbsp;
                    <label for="pgen_<?php echo 'pwd_special_'.$pgen_specialcharacter_i;?>" class="<?php echo ($pgen_attr_checked_specialcharacter ? 'pgen-specialcharacter-selected' : '');?>"><?php echo $pgen_specialcharacter_list_value;?></label>
                </div>
                <?php
				}
				?>

                <div class="pgen-clear"></div>

                <div class="pgen_ckeckuncheckspecialcharacters_container">

                    <p id="pgen_uncheckallspecialcharacters" class="pgen_checkallspecialcharacters"><?php echo $pgen_lang_uncheckAllSpecialCharacters;?></p>

                    <p id="pgen_checkallspecialcharacters" style="display:none" class="pgen_checkallspecialcharacters"><?php echo $pgen_lang_checkAllSpecialCharacters;?></p>

                </div>

            </div><!-- pgen-specialcharacterslist-container -->


            <!-- PASSWORD OPTION: SIMILAR CHARACTERS -->
            <div class="pgen-password-option">

                <input <?php echo ($pgen_check_pwd_similar ? $pgen_check_pwd_similar : '');?> type="checkbox" name="pgen_pwd_options[]" value="pwd_similar" id="pgen_pwd_similar" class="pgen_pwdoption" />&nbsp;

                <label for="pgen_pwd_similar" class="pgen_pwdoption">

                    <span class="pgen-label-title <?php echo ($pgen_check_pwd_similar ? 'pgen-label-selected' : '');?>"><?php echo $pgen_lang_excludeSimilarCharacters;?></span>

                    <span class="pgen-bracket">[</span>

                    <span class="pgen-smilarcharacter-list">0 O I 1 l</span>

                    <span class="pgen-bracket">]</span>

                </label>

            </div><!-- pgen-password-option -->


            <!-- PASSWORD OPTION: PASSWORD LENGTH -->
            <div class="pgen-password-option">

                <select name="pgen_passwordlength" id="pgen_passwordlength">
                    <?php
				for($pgen_i = $pgen_config_passwordlength_min; $pgen_i<=$pgen_config_passwordlength_max; $pgen_i++){
					if($pgen_i == $pgen_config_passwordlength){
						$pgen_selected_attr = ' selected ="selected" ';
					} else{
						$pgen_selected_attr = '';
					}
					
					echo "\t\t\t\t".'<option value="'.$pgen_i.'" '.$pgen_selected_attr.'>'.$pgen_i.'</option>';
					
					echo "\r\n";
				}
				?>
                </select>

                <label for="pgen_passwordlength"><?php echo $pgen_lang_passwordLength;?> <?php echo $pgen_lang_longerPassword;?></label>

            </div><!-- pgen-password-option -->


            <!-- PASSWORD OPTION: PASSWORD QUANTITY -->
            <div class="pgen-password-option">

                <select name="pgen_nbpwd" id="pgen_nbpwd">
                    <?php
				foreach($pgen_config_quantity_array as $pgen_config_quantity_value){
					echo "\t\t\t\t".'<option value="'.$pgen_config_quantity_value.'" '.(($pgen_config_quantity_value==$pgen_config_quantity)?'selected':'').'>'.$pgen_config_quantity_value.'</option>';
					echo "\r\n";
				}
				?>
                </select>

                <label for="pgen_nbpwd"><?php echo $pgen_lang_quantity;?> <?php echo $pgen_lang_createMultiplePasswordsAtOnce;?></label>

            </div><!-- pgen-password-option -->

        </div><!-- pgen-options -->


        <div class="pgen-submit-container">

            <input type="submit" id="pgen_generator_btn" value="<?php echo $pgen_lang_submit;?>" class="pgen-button pgen-button-yellow" />

            <div class="pgen-loading"><img src="<?php echo $plug_fl; ?>img/loading.gif" /></div>

            <div class="pgen-error">
            </div>

        </div><!-- pgen-submit-container -->


        <div class="pgen-password-list">
        </div>

        <div class="pgen-clear"></div>

    </div> <!-- pgen-form-container -->


    <p><?php echo $pgen_lang_intro;?></p>


    <ul class="pgen-ul-lock">
        <li><?php echo $pgen_lang_pwdLongerPasswordsAreMoreDifficultToCrack;?></li>
        <li><?php echo $pgen_lang_pwdLengthShouldBe;?></li>
        <li><?php echo $pgen_lang_noDataStored;?></li>
    </ul>




</div><!-- pgen-container -->


<!-- JS: JQUERY -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<!-- JS: PASSWORDGENERATOR -->
<script type="text/javascript" src="<?php echo $plug_fl; ?>js/passwordgenerator.js.php?plgurl=<?php echo $plug_fl; ?>"></script>
