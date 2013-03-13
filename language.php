<?php
/* File: language.php
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

if(isSet($_GET['lang'])) {
    $lang = $_GET['lang'];

    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang'])) {

    $lang = $_SESSION['lang'];

} else if(isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}
switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;
    case 'pl':
        $lang_file = 'lang.pl.php';
        break;
    default:
        $lang_file = 'lang.pl.php';
}

include_once 'lang/' . $lang_file;
?>