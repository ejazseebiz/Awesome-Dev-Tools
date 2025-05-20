<?php
require_once('config.php');

require_once('../lang/'.$pgen_config_language.'.php');

require_once('../class/class.passwordgenerator.php');

$pgen_obj = new passwordgenerator();


$pgen_password = array();


if(!isset($_POST['pwd_options']) 
	|| !$_POST['pwd_options'] 
	|| $_POST['length'] < $pgen_config_passwordlength_min 
	|| $_POST['nbpwd'] < 1 
	|| $_POST['nbpwd'] > max($pgen_config_quantity_array)
	|| (count($_POST['pwd_options']) == 1 && $_POST['pwd_options'][0] == 'pwd_similar')
	
	)
{
	echo '{"error": "'.addcslashes($pgen_lang_selectAtLeastOneIncludeOption, '"').'"}';
	exit;
}


$pwd_number = array('0','1','2','3','4','5','6','7','8','9');

$pwd_lowercase = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

$pwd_uppercase = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

if(in_array('pwd_similar', $_POST['pwd_options']))
{
	$pwd_number = array('2','3','4','5','6','7','8','9');
	$pwd_lowercase = array('a','b','c','d','e','f','g','h','i','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z');
	$pwd_uppercase = array('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	// remove similar characters
	$key_similar = array_search('pwd_similar', $_POST['pwd_options']);
	unset($_POST['pwd_options'][$key_similar]);
	
}


if(isset($_POST['pgen_specialcharacter']) && $_POST['pgen_specialcharacter'])
{
	foreach($_POST['pgen_specialcharacter'] as $value)
	{
		$pwd_special[] = $value;
	}
} else{
	$pwd_special = $pgen_specialcharacter_list;
}

$post_length = trim($_POST['length']);

// print_r($_POST);

// echo count($_POST['pwd_options']).'<hr />';

$ponderation = floor($post_length/count($_POST['pwd_options']));

// echo $ponderation.'<hr />';



for($loop_nbpwd_count = 1; $loop_nbpwd_count <= $_POST['nbpwd']; $loop_nbpwd_count++)
{

	// $generator stores the password characters
	$generator = array();
	$mod_i = ''; 
	
	foreach($_POST['pwd_options'] as $key=>$value)
	{
		
		
		for($i=1; $i<=$ponderation; $i++)
		{
			$rand_key = array_rand(${$value});
			$generator[] = ${$value}[$rand_key];
			
		}
	}
	
	$mod = $post_length % count($_POST['pwd_options']);
	
	$nb_passe = ceil($mod/count($_POST['pwd_options']));
	
		
	for($passe = 1; $passe<= $nb_passe; $passe++)
	{
	
		foreach($_POST['pwd_options'] as $key=>$value)
		{
			$rand_key = array_rand(${$value});
				
			$generator[] = ${$value}[$rand_key];
			
			$mod_i++;
				
			if($mod_i == $mod){
				$passe_break = true;
				break;
			}
		}
		
		if($passe_break) break;
		
	}
	
	//print_r($generator); echo '<hr>';
	
	shuffle($generator);
	
	
	$pgen_password[$loop_nbpwd_count] = '';
	
	foreach($generator as $key=>$value){
		$pgen_password[$loop_nbpwd_count] .= $value;
	}
}

	

$json_passwords_value = array();

$json_passwords_input = array();
	
if($pgen_password){
	foreach($pgen_password as $password_value)
	{
		//$json_passwords_value .= '"'.addcslashes($password_value, '"').'",';
		$json_passwords_value[] = $password_value;
		//$json_passwords_input .= '"'.addcslashes( $pgen_obj->htmlPasswordInput($password_value) , '"').'",';
		$json_passwords_input[] = $pgen_obj->htmlPasswordInput($password_value);
	}
}
	
	
$json_passwords_textarea = $pgen_obj->htmlPasswordTextarea($pgen_password);
	
//var_dump($json_passwords_value);exit;
	
$json['passwords_value'] = $json_passwords_value;

$json['passwords_input'] = $json_passwords_input;

$json['passwords_textarea'] = $json_passwords_textarea;

echo json_encode($json);
	
exit;

?>