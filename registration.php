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
	public function __construct($element) {
		parent::__construct($element);
	}
	
	public function build() {
		$info = new Element('ul', array('class' => 'registration_info'));
		$form = new Element('form', array('class' => 'registration_form'));
		
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
		$hidden     = new Element('input', array('type' => 'hidden', 'name' => 'action_register', 'value' => 'true'));
		$username   = new Element('input', array('type' => 'text', 'name' => 'registration_form_username', 'class' => 'registration_text_field_must_be', 'size' => '50'));
		$password   = new Element('input', array('type' => 'password', 'name' => 'registration_form_password', 'class' => 'registration_text_field_must_be', 'size' => '50'));
		$repassword = new Element('input', array('type' => 'password', 'name' => 'registration_form_reenter_password', 'class' => 'registration_text_field_must_be', 'size' => '50'));
		$email      = new Element('input', array('type' => 'text', 'name' => 'registration_form_email', 'class' => 'registration_text_field_must_be', 'size' => '50'));
		$reemail    = new Element('input', array('type' => 'text', 'name' => 'registration_form_reenter_email', 'class' => 'registration_text_field_must_be', 'size' => '50'));
		$firstname  = new Element('input', array('type' => 'text', 'name' => 'registration_form_firstname', 'class' => 'registration_text_field', 'size' => '50'));
		$lastname   = new Element('input', array('type' => 'text', 'name' => 'registration_form_lastname', 'class' => 'registration_text_field', 'size' => '50'));
		$country    = new Element('select', array('type' => 'text', 'name' => 'registration_form_country', 'class' => 'registration_select_field'));
		$submit     = new Element('input', array('type' => 'submit', 'value' => $this->getText('REGISTRATION_REGISTER'), 'id' => 'submit_button'));
		
		$form->nest($hidden);
		$form->nest($this->getText('REGISTRATION_USERNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($username);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_PASSWORD') . ':');
		$form->nest(new Element('br'));
		$form->nest($password);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_REENTER_PASSWORD') . ':');
		$form->nest(new Element('br'));
		$form->nest($repassword);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_EMAIL') . ':');
		$form->nest(new Element('br'));
		$form->nest($email);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_REENTER_EMAIL') . ':');
		$form->nest(new Element('br'));
		$form->nest($reemail);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_FIRSTNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($firstname);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_LASTNAME') . ':');
		$form->nest(new Element('br'));
		$form->nest($lastname);
		$form->nest(new Element('br'));
		$form->nest($this->getText('REGISTRATION_COUNTRY') . ':');
		$form->nest(new Element('br'));
		$form->nest($country);
		$form->nest(new Element('br'));
		$form->nest($submit);
		
		$this->createCountryList($country);
	}
	
	private function createCountryList($country) {
		foreach($GLOBALS['country_list'] as $short => $long) {
			$option = new Element('option', array('value' => $short));
			$option->set('innerHtml', $long);
			
			if ('PL' == $short) {
				$option->set('selected', 'selected');
			}
			
			$country->nest($option);
		}
	}
}
?>