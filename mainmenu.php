<?php
/* File: mainmenu.php
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

class MainMenu extends Builder {
	private $menuItems = array();
	
	public function __construct(Element $element) {
		parent::__construct($element);
		
		$this->menuItems[1] = $this->getText('MAIN_MENU_HOME');
		$this->menuItems[2] = $this->getText('MAIN_MENU_NEWS');
		$this->menuItems[3] = $this->getText('MAIN_MENU_ARENA_28');
		$this->menuItems[4] = $this->getText('MAIN_MENU_LINKS');
		$this->menuItems[5] = $this->getText('MAIN_MENU_CONTACT');
		$this->menuItems[6] = $this->getText('MAIN_MENU_REGISTRAION');
	}
	
	public function build() {
		$this->nest($this->menuList());
	}
	
	private function menuList() {
		$ul = new Element('ul');
		
		foreach($this->menuItems as $key => $item) {
			$li = new Element('li');
			$a  = new Element('a', array('href' => 'index.php?menu=' . $key));
			
			if ($key == $this->getCurrentIndex()) {
				$a->set('class', 'selected');
			}
			
			$a->nest($item);
			$li->nest($a);
			$ul->nest($li);
		}
		
		return $ul;
	}
	
	private function getCurrentIndex() {
		$index = SessionManager::getInstance()->getMenu();

		if (!isset($this->menuItems[ $index ])) {
			$index = 1;
		}
		
		return $index;
	}
}
?>