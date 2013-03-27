<?php
/* File: sessionmanager.php
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

final class SessionManager {
	private static $instance = false;
	private static $menuList = array();
	
	private function __construct() {
	}
	
	public static function getInstance() {
		if (self::$instance == false) {
			self::$instance = new SessionManager();
		}
		
		return self::$instance;
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
	
	public static function getMenuList() {
		self::$menuList = array();
		
		self::$menuList[1] = Builder::getText('MAIN_MENU_HOME');
		self::$menuList[2] = Builder::getText('MAIN_MENU_NEWS');
		self::$menuList[3] = Builder::getText('MAIN_MENU_ARENA_28');
		self::$menuList[4] = Builder::getText('MAIN_MENU_LINKS');
		self::$menuList[5] = Builder::getText('MAIN_MENU_CONTACT');
		self::$menuList[6] = Builder::getText('MAIN_MENU_REGISTRAION');
		
		return self::$menuList;
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
		
		if (!isset(self::$menuList[ $index ])) {
			$index = 1;
		}
		
		return $index;
	}
}
?>