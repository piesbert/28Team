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

class Registration {
	private $form = NULL;
	private $list = array();
	
	private $username  = '';
	private $password1 = '';
	private $password2 = '';
	private $email1    = '';
	private $email2    = '';
	private $firstname = '';
	private $lastname  = '';
	
	public function __construct() {
	}
	
	public function get() {
		$this->build();
		return $this->form;
	}
	
	private function build() {
		if (!$this->isFormValid()) {
			$this->generateList();
			$this->form = new Template('templates/registrationform.php', $this->list);
		}
	}
	
	private function isFormValid() {
		$valid = false;
		
		$this->setupMustBeFields();
		
		if (isset($_POST['action_register']) && 'true' == $_POST['action_register']) {
			$valid = true;
			
			$this->readFormValues();
			
			$this->clearErrors();
			$this->setupFields();
			
			/* check username length (min 1 character)
			 */
			$length = strlen($this->username);
			if (1 > $length) {
				$this->list['error_username'] = $this->getError(tr('REGISTRATION_ERROR_NULL_USERNAME'));
				$this->list['class_username'] = "registration_text_field_wrong";
				$valid = false;
			}
			
			/* check password length (min 8 characters)
			 */
			$length = strlen($this->password1);
			if (0 == $length) {
				$this->list['error_password1'] = $this->getError(tr('REGISTRATION_ERROR_NULL_PASSWORD'));
				$this->list['class_password1'] = "registration_text_field_wrong";
				$valid = false;
			}
			else if (8 > $length) {
				$this->list['error_password1'] = $this->getError(tr('REGISTRATION_ERROR_LENGTH_PASSWORD'));
				$this->list['class_password1'] = "registration_text_field_wrong";
				$valid = false;
			}
			
			/* check if passwordds are identical
			 * !!! <else> from previous <if>
			 */
			else if ($this->password1 != $this->password2) {
				$this->list['error_password2'] = $this->getError(tr('REGISTRATION_ERROR_SAME_PASSWORD'));
				$this->list['class_password1'] = "registration_text_field_wrong";
				$this->list['class_password2'] = "registration_text_field_wrong";
				$valid = false;
			}
			
			/* check if email address is valid
			 */
			if (!$this->isEmailValid($this->email1)) {
				$this->list['error_email1'] = $this->getError(tr('REGISTRATION_ERROR_VALID_EMAIL'));
				$this->list['class_email1'] = "registration_text_field_wrong";
				$valid = false;
			}
			/* check if both emails are the same
			 */
			else if ($this->email1 != $this->email2) {
				$this->list['error_email2'] = $this->getError(tr('REGISTRATION_ERROR_SAME_EMAIL'));
				$this->list['class_email2'] = "registration_text_field_wrong";
				$valid = false;
			}
		}
		
		return $valid;
		
	}
	
	private function clearErrors() {
		$this->list['error_username'] = '';
		$this->list['error_password1'] = '';
		$this->list['error_password2'] = '';
		$this->list['error_email1'] = '';
		$this->list['error_email2'] = '';
	}
	
	private function setupMustBeFields() {
		$this->list['class_username']  = "registration_text_field_must_be";
		$this->list['class_password1'] = "registration_text_field_must_be";
		$this->list['class_password2'] = "registration_text_field_must_be";
		$this->list['class_email1']    = "registration_text_field_must_be";
		$this->list['class_email2']    = "registration_text_field_must_be";
	}
	
	private function setupFields() {
		$this->list['v_username']  = $this->username;
		$this->list['v_email']     = $this->email1;
		$this->list['v_rentemail'] = $this->email2;
		$this->list['v_firstname'] = $this->firstname;
		$this->list['v_lastname']  = $this->lastname;
	}
	
	private function getError($text) {
		$error  = "<span class=\"registration_error\">";
		$error .= $text;
		$error .= "</span><br/>";
		
		return $error;
	}
	
	private function generateList() {
		$this->list['reginfo01'] = tr('REGISTRATION_INFO_1');
		$this->list['reginfo02'] = tr('REGISTRATION_INFO_2');
		$this->list['reginfo03'] = tr('REGISTRATION_INFO_3');
		
		$this->list['username']  = tr('REGISTRATION_USERNAME');
		$this->list['password']  = tr('REGISTRATION_PASSWORD');
		$this->list['rentpass']  = tr('REGISTRATION_REENTER_PASSWORD');
		$this->list['email']     = tr('REGISTRATION_EMAIL');
		$this->list['rentemail'] = tr('REGISTRATION_REENTER_EMAIL');
		$this->list['firstname'] = tr('REGISTRATION_FIRSTNAME');
		$this->list['lastname']  = tr('REGISTRATION_LASTNAME');
		$this->list['register']  = tr('REGISTRATION_REGISTER');
	}
	
	private function readFormValues() {
		$this->username  = clear($_POST['registration_username']);
		$this->password1 = clear($_POST['registration_password']);
		$this->password2 = clear($_POST['registration_reenter_password']);
		$this->email1    = clear($_POST['registration_email']);
		$this->email2    = clear($_POST['registration_reenter_email']);
		$this->firstname = clear($_POST['registration_firstname']);
		$this->lastname  = clear($_POST['registration_lastname']);
	}
	
	private function isEmailValid($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}
?>