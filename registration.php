<?php
/* File: registration.php
 * Author: Sebasian Szymak
 *
 * This file is part of 28Team.
 *
 * Foobar is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */

class Registration extends Builder {
	private $hidden;
	private $username;  
	private $password;  
	private	$repassword;
	private $email;
	private	$reemail;
	private $firstname;
	private $lastname;
	private	$country;
	private	$submit;
	
	private $v_username;
	private $v_password;
	private	$v_repassword;
	private $v_email;
	private	$v_reemail;
	private $v_firstname;
	private $v_lastname;
	private	$v_country;
	
	private $usernameError;
	private $passwordError;
	private $emailError;
	
	private $error;
	 
	public function __construct($element) {
		parent::__construct($element);
		
		$this->hidden     = new Element('input', array('type' => 'hidden', 'name' => 'action_register', 'value' => 'true'));
		$this->username   = new Element('input', array('type' => 'text', 'name' => 'registration_form_username', 'class' => 'registration_text_field_must_be'));
		$this->password   = new Element('input', array('type' => 'password', 'name' => 'registration_form_password', 'class' => 'registration_text_field_must_be'));
		$this->repassword = new Element('input', array('type' => 'password', 'name' => 'registration_form_reenter_password', 'class' => 'registration_text_field_must_be'));
		$this->email      = new Element('input', array('type' => 'text', 'name' => 'registration_form_email', 'class' => 'registration_text_field_must_be'));
		$this->reemail    = new Element('input', array('type' => 'text', 'name' => 'registration_form_reenter_email', 'class' => 'registration_text_field_must_be'));
		$this->firstname  = new Element('input', array('type' => 'text', 'name' => 'registration_form_firstname', 'class' => 'registration_text_field'));
		$this->lastname   = new Element('input', array('type' => 'text', 'name' => 'registration_form_lastname', 'class' => 'registration_text_field'));
		$this->country    = new Element('select', array('type' => 'text', 'name' => 'registration_form_country', 'class' => 'registration_select_field'));
		$this->submit     = new Element('input', array('type' => 'submit', 'value' => $this->getText('REGISTRATION_REGISTER'), 'id' => 'submit_button'));
		
		$this->v_country  = 'PL'; 
		
		$this->usernameError = '';
		$this->passwordError = '';
		$this->emailError = '';
	}
	
	public function build() {
		$this->validateForm();
		
		$info = new Element('ul', array('class' => 'registration_info'));
		$form = new Element('form', array('class' => 'registration_form', 'action' => 'index.php?menu=6', 'method' => 'post'));
		
		$this->nest($info);
		$this->nest($form);
		
		$this->createInfo($info);	
		$this->createForm($form);
	}
	
	private function createInfo($info) {
		$li = new Element('li');
		$li->nest($this->getText('REGISTRATION_INFO_1'));
		$info->nest($li);
		
		$li = new Element('li');
		$li->nest($this->getText('REGISTRATION_INFO_2'));
		$info->nest($li);
		
		$li = new Element('li');
		$li->nest($this->getText('REGISTRATION_INFO_3'));
		$info->nest($li);
	}
	
	private function createForm($form) {
		$form->nest($this->hidden);
		$form->nest($this->getText('REGISTRATION_USERNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->username);
		$form->nest(new Element('br'));
		if ('' != $this->usernameError) {
			$error = new Element('span', array('class' => 'registration_error'));
			$error->set('innerHtml', $this->usernameError);
			$form->nest($error);
			$form->nest(new Element('br'));
		}
		$form->nest($this->getText('REGISTRATION_PASSWORD') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->password);
		$form->nest(new Element('br'));		
		if ('' != $this->passwordError) {
			$error = new Element('span', array('class' => 'registration_error'));
			$error->set('innerHtml', $this->passwordError);
			$form->nest($error);
			$form->nest(new Element('br'));
		}
		$form->nest($this->getText('REGISTRATION_REENTER_PASSWORD') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->repassword);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_EMAIL') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->email);
		$form->nest(new Element('br'));
		if ($this->getText('REGISTRATION_ERROR_VALID_EMAIL') == $this->emailError) {
			$error = new Element('span', array('class' => 'registration_error'));
			$error->set('innerHtml', $this->emailError);
			$form->nest($error);
			$form->nest(new Element('br'));
		}
		$form->nest($this->getText('REGISTRATION_REENTER_EMAIL') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->reemail);
		$form->nest(new Element('br'));
		if ($this->getText('REGISTRATION_ERROR_SAME_EMAIL') == $this->emailError) {
			$error = new Element('span', array('class' => 'registration_error'));
			$error->set('innerHtml', $this->emailError);
			$form->nest($error);
			$form->nest(new Element('br'));
		}
		$form->nest($this->getText('REGISTRATION_FIRSTNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->firstname);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_LASTNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->lastname);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_COUNTRY') . ':');
		$form->nest(new Element('br'));
		$form->nest($this->country);
		$form->nest(new Element('br'));
		$form->nest($this->submit);
		
		$this->createCountryList($this->country);
	}
	
	private function validateForm() {
		if ('true' == $_POST['action_register']) {
			$this->setupFields();
			$this->validateUsername();
			$this->validatePassword();
			$this->validateEmail();
		}
	}
	
	private function split($str) {
		return htmlspecialchars(stripslashes(strip_tags(trim($str)))); 
	}
	
	private function setupFields() {
		$this->v_username   = $this->split($_POST['registration_form_username']);
		$this->v_password   = $this->split($_POST['registration_form_password']);
		$this->v_repassword = $this->split($_POST['registration_form_reenter_password']);
		$this->v_email      = $this->split($_POST['registration_form_email']);
		$this->v_reemail    = $this->split($_POST['registration_form_reenter_email']);
		$this->v_firstname  = $this->split($_POST['registration_form_firstname']);
		$this->v_lastname   = $this->split($_POST['registration_form_lastname']);
		$this->v_country    = $this->split($_POST['registration_form_country']);
		
		$this->username->set('value', $this->v_username);
		$this->password->set('value', $this->v_password);
		$this->repassword->set('value', $this->v_repassword);
		$this->email->set('value', $this->v_email);
		$this->reemail->set('value', $this->v_reemail);
		$this->firstname->set('value', $this->v_firstname);
		$this->lastname->set('value', $this->v_lastname);
	}
	
	private function validateUsername() {
		$length = strlen($this->v_username);
		
		if ($length < 1) {
			$this->usernameError = $this->getText('REGISTRATION_ERROR_NULL_USERNAME');
			$this->username->set('class', 'registration_text_field_wrong');
		}
	}
	
	private function validatePassword() {
		if ("" == $this->v_password) {
			$this->passwordError = $this->getText('REGISTRATION_ERROR_NULL_PASSWORD');
		}
		else if (strlen($this->v_password) < 8) {
			$this->passwordError = $this->getText('REGISTRATION_ERROR_LENGTH_PASSWORD');
		}
		else if ($this->v_password != $this->v_repassword) {
			$this->passwordError = $this->getText('REGISTRATION_ERROR_SAME_PASSWORD');
		}
		
		if ('' != $this->passwordError) {
			$this->password->set('value', '');
			$this->password->set('class', 'registration_text_field_wrong');
			$this->repassword->set('value', '');
			$this->repassword->set('class', 'registration_text_field_wrong');
		}
	}
	
	private function validateEmail() {
		if(!$this->isEmailValid($this->v_email)) {
			$this->emailError = $this->getText('REGISTRATION_ERROR_VALID_EMAIL');
			
			$this->email->set('value', '');
			$this->email->set('class', 'registration_text_field_wrong');
			$this->reemail->set('value', '');
			$this->reemail->set('class', 'registration_text_field_wrong');
		}
		else if($this->v_email != $this->v_reemail) {
			$this->emailError = $this->getText('REGISTRATION_ERROR_SAME_EMAIL');
			
			$this->reemail->set('value', '');
			$this->reemail->set('class', 'registration_text_field_wrong');
		}
	}
	
	private function createCountryList($country) {
		foreach($GLOBALS['country_list'] as $short => $long) {
			$option = new Element('option', array('value' => $short));
			$option->set('innerHtml', $long);
			
			if ($this->v_country == $short) {
				$option->set('selected', 'selected');
			}
			
			$country->nest($option);
		}
	}
	
	private function isEmailValid($email) {
		$isValid = true;
		$atIndex = strrpos($email, "@");
		
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		}
		else {
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			
			if ($localLen < 1 || $localLen > 64) {
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local)) {
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain)) {
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))	{
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}
}
?>