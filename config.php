<?php
/* File: config.php
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

header('Cache-control: private'); // IE 6 fix

function baseLoader($className) {
    include_once(strtolower($className) . ".php");
}

spl_autoload_register('baseLoader');

function clear($text) {
	return htmlspecialchars(stripslashes(strip_tags(trim($text))), ENT_QUOTES);
}

include_once 'language.php';
?>