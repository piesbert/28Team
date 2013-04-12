<?php
/* File: index.php
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
session_start();

include_once('config.php');

class Main {
	private $html;
	
	private $loginPanel;
	private $mainMenu;
	
	private $title;
	private $content;

	public function __construct() {
		
	}
	
	public function build() {
		$this->loginPanel = new LoginPanel();
		$this->mainMenu   = new MainMenu();
		
		$this->setupContent();
		
		$this->html = new Template('templates/mainpage.php',
				array('loginPanel' => $this->loginPanel->get(),
				      'mainMenu'   => $this->mainMenu->get(),
					  'title'      => $this->title,
					  'content'    => $this->content->get()
		));
	}
	
	public function render() {
		$this->html->render();
	}
	
	private function getLoginPanel() {
		$lp = new LoginPanel();
		return $lp->get();
	}
	
	private function setupContent() {
		$this->title = '';
		
		/* will be changed later */
		$this->content = new Registration();
		
		switch (SessionManager::getMenuIndex()) {
			case 1:
				$this->title = tr('TITLE_HOME');
				break;
			case 2:
				$this->title = tr('TITLE_NEWS');
				break;
			case 3:
				$this->title = tr('TITLE_AREA_28');
				break;
			case 4:
				$this->title = tr('TITLE_LINKS');
				break;
			case 5:
				$this->title = tr('TITLE_CONTACT');
				break;
			case 6:
				if (SessionManager::isLoggedIn()) {
					$this->title = tr('TITLE_USERDATA');
				}
				else {
					$this->title = tr('TITLE_REGISTRATION');
					$this->content = new Registration();
				}
				break;
		}
	}
}

$main = new Main();
$main->build();
$main->render();
?>