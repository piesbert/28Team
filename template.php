<?php
/* File: template.php
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

class Template {
	private $args;
	private $file;

	public function __get($name) {
		return $this->args[$name];
	}

	public function __construct($file, $args = array()) {
		$this->file = $file;
		$this->args = $args;
	}

	public function render() {
		include $this->file;
	}
}
?>