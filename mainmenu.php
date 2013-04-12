<?php
/* File: mainmenu.php
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

class MainMenu {
	private $mainMenu = NULL;
	
	public function __construct() {
	}
	
	public function get() {
		$this->build();
		return $this->mainMenu;
	}
	
	private function build() {
		$sel = array(1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '');
		$menuList = array();
		

		$menuList['home']    = tr('MAIN_MENU_HOME');
		$menuList['news']    = tr('MAIN_MENU_NEWS');
		$menuList['area']    = tr('MAIN_MENU_AREA_28');
		$menuList['links']   = tr('MAIN_MENU_LINKS');
		$menuList['contact'] = tr('MAIN_MENU_CONTACT');
		
		if (SessionManager::isLoggedIn()) {
			$menuList['user'] = tr('MAIN_MENU_USERDATA');
		}
		else {
			$menuList['user'] = tr('MAIN_MENU_REGISTRATION');
		} 
		
		$sel[SessionManager::getMenuIndex()] = ' class="selected"';
		$menuList['sel'] = $sel;
		
		$this->mainMenu = new Template('templates/mainmenu.php', $menuList);
	}
}
?>