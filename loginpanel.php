<?php
/* File: loginpanel.php
 * Author: Sebasian Szymak
 *
 * This file is part of 28Team.
 *
 * 28Team is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * 28Team is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with 28Team.  If not, see <http://www.gnu.org/licenses/>.
 */

class LoginPanel {
	private $loginPanel = NULL;
	
	public function __construct() {
	}
	
	public function get() {
		$this->build();
		return $this->loginPanel;
	}
	
	private function build() {
		if (false == SessionManager::isLoggedIn()) {
			$this->loginPanel = new Template('templates/loginpanel.php',
				array('username' => tr('LOGIN_PANEL_USERNAME'),
					  'password' => tr('LOGIN_PANEL_PASSWORD'),
					  'login'    => tr('LOGIN_PANEL_LOGIN'),
					  'forgot'   => tr('LOGIN_PANEL_FORGOT')));
		}
		else {
			$this->loginPanel = new Template('templates/loginpanel_in.php',
			    array('logout'   => tr('LOGIN_PANEL_LOGOUT'),
			    	  'loggedIn' => tr('LOGIN_PANEL_LOGGED_IN'),
					  'username' => SessionManager::getUserName()));
		}
	}
}
?>