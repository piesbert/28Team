<?php
/* File: sessionmanager.php
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

final class SessionManager {
	private static $instance = false;
	private static $menuList = array();
	
	private static $loginInfo = 'loginInfo';
	
	private function __construct() {
	}
	
	public static function isLoggedIn() {
		$loggedIn = false;
		
		if (isset($_SESSION[self::$loginInfo])) {
			$loggedIn = true;
		}
		
		return $loggedIn;
	}
	
	public static function getUserName() {
		return $_SESSION[self::$loginInfo];
	}
	
	public static function getLang() {
		$lang = 'en';
		
		if(isSet($_GET['lang'])) {
			$lang = $_GET['lang'];
		
			$_SESSION['lang'] = $lang;
			setcookie('lang', $lang, time() + (3600 * 24 * 30));
		}
		else if(isSet($_SESSION['lang'])) {
		
			$lang = $_SESSION['lang'];
		
		} else if(isSet($_COOKIE['lang'])) {
			$lang = $_COOKIE['lang'];
		}
		
		return $lang;
	}
	
	public static function getMenuIndex() {
		$index = 1;
		
		if(isSet($_GET['menu'])) {
			$index = $_GET['menu'];
			$_SESSION['menu'] = $index;
		}
		else if(isSet($_SESSION['menu']) && isset($_GET['lang'])) {
			$index = $_SESSION['menu'];
		}
		
		if ($index > 6 || $index < 1) {
			$index = 1;
		}
		
		return $index;
	}
}
?>