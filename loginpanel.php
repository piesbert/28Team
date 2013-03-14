<?php
/* File: loginpanel.php
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

class LoginPanel extends Builder {
	public function __construct(Element $element) {
		parent::__construct($element);
	}
	
	public function build() {
		$div  = new Element('div',   array('class' => 'login_form'));
		$form = new Element('form',  array('action' => 'index.php', 'method' => 'post'));
		
		$div->nest($form);
		
		$this->nest($div);
		
		if (true == $_SESSION['logged_in']) {
			$this->userInfo($form);
		}
		else {
			$this->loginForm($form);
			$this->nest($this->forgot());
		}
	}
	
	private function loginForm($form) {
		$hidden   = new Element('input', array('type' => 'hidden', 'name' => 'action_login', 'value' => 'true'));
		$username = new Element('input', array('type' => 'text', 'name' => 'login_form_login', 'id' => 'text_field', 'size' => '10'));
		$password = new Element('input', array('type' => 'password', 'name' => 'login_form_password', 'id' => 'text_field', 'size' => '10'));
		$submit   = new Element('input', array('type' => 'submit', 'value' => $this->getText('LOGIN_PANEL_LOGIN'), 'id' => 'submit_button'));
	
		$form->nest($hidden);
		$form->nest($this->getText('LOGIN_PANEL_USERNAME') . ":&nbsp;");
		$form->nest($username);
		$form->nest("&nbsp;" . $this->getText('LOGIN_PANEL_PASSWORD') . ":&nbsp;");
		$form->nest($password);
		$form->nest("&nbsp;");
		$form->nest($submit);
	}
	
	private function userInfo($form) {
		$hidden = new Element('input', array('type' => 'hidden', 'name' => 'action_logout', 'value' => 'true'));
		$submit = new Element('input', array('type' => 'submit', 'value' => $this->getText('LOGIN_PANEL_LOGOUT'), 'id' => 'submit_button'));
		
		$form->nest($hidden);
		$form->nest($submit);
	}
	
	private function forgot() {
		$div  = new Element('div', array('class' => 'forgot'));
		$link = new Element('a',   array('href' => 'index.php?action=forgot'));
	
		$link->nest($this->getText('LOGIN_PANEL_FORGOT'));
	
		$div->nest($link);
	
		return $div;
	}
}
?>