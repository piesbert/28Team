<?php
/* File: templates/mainpage.php
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>28Team.pl</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="28team, geocaching, opencaching, geocoin, geocoins, travelbug, travelbugs, geokret, geokrety" />
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/base.css" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/forms.css" />
</head>
<body>
<div class="builder">
<div class="window">
<div class="flags">
<a href="index.php?lang=pl"><img src="images/flags/pl.png" alt="Polski"/></a>
<a href="index.php?lang=en"><img src="images/flags/en.png" alt="English"/></a>
</div>
<?php $this->loginPanel->render();?>
<?php $this->mainMenu->render();?>
<div class="content"><div class="content_title"><span><?=$this->title;?></span></div>
<div class="content_window">
<?php $this->content->render();?>
</div>
</div>
</div>
<div class="vim_powered"><a href="http://www.vim.org" target="_blank"><img src="images/vim_powered.png" align="right" alt="Powered by VIM" /></a></div>
</div>
</body>
</html>