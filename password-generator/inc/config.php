<?php
// Default language file is lang/en.php
// If your custom language file is named "custom.php", the value to set for the variable below would be "custom"
$pgen_config_language = 'en';

// Set the value to false/true to change the preselection for "include numbers"
$pgen_preselect_pwd_number = true;

// Set the value to false/true to change the preselection for "include lowercase letters"
$pgen_preselect_pwd_lowercase = true;

// Set the value to false/true to change the preselection for "include uppercase letters"
$pgen_preselect_pwd_uppercase = true;

// Set the value to false/true to change the preselection for "include special symbols"
$pgen_preselect_pwd_special = false;

// Set the value to false/true to change the preselection for "exclude similar characters"
$pgen_preselect_pwd_similar = true;

// Selected password length by default
$pgen_config_passwordlength = 8;

// Min password length
$pgen_config_passwordlength_min = 2;

// Max password length
$pgen_config_passwordlength_max = 32;

// Selected password quantity by default
$pgen_config_quantity = 1;

// Values for  the password quantity select list
$pgen_config_quantity_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 20, 30);

// List of special characters
// The character \ requires smart quoting
$pgen_specialcharacter_list = array('~','!','@','#','$','%','^','&','*','(',')','-','_','=','+','[',']','{','}',';',':',',','.','<','>','/','?');

?>