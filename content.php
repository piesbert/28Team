<?php
/* File: content.php
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

class Content extends Builder {
	public function __construct(Element $element) {
		parent::__construct($element);
	}
	
	public function build() {
		$title = new Element('div', array('class' => 'content_title'));
		$element  = new Element('div', array('class' => 'content_window'));
		
		switch(SessionManager::getInstance()->getMenuIndex()) {
			case 1:
				break;
			case 2:
				break;
			case 3:
				break;
			case 4:
				break;
			case 5:
				break;
			case 6: 
				$registration = new Registration($element);
				$registration->build();
				
				$title->nest($this->getText('TITLE_REGISTRATION'));
				break;
		}
		
		$this->nest($title);
		$this->nest($element);
	}
}
?>