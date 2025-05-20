<?php

class passwordGenerator{
	
	function passwordGenerator(){
		
		$this->password_input_class = 'pgen-password-input';
		$this->password_textarea_class = 'pgen-password-textarea';
	}
	
	function htmlPasswordInput($value){
		
		$input = '<input type="text" class="'.$this->password_input_class.'" value="'.htmlentities($value, ENT_QUOTES, 'UTF-8').'" />';
		
		return $input;
	}
	
	function htmlPasswordTextarea($value){
		
		$json_passwords_textarea = '';
		
		if($value){
			foreach($value as $password_value)
			{
				$json_passwords_textarea .= $password_value."\r\n";
			}
		}
		
		$input = '<textarea class="'.$this->password_textarea_class.'" rows="'.count($value).'" >'.$json_passwords_textarea.'</textarea>';

		return $input;
	}
}
// é
?>