<?php
/* File: templates/loginpanel.php
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
<div class="main_menu_panel">
<ul>
<li><a href="index.php?menu=1"<?=$this->sel[1];?>><span><?=$this->home;?></span></a></li>
<li><a href="index.php?menu=2"<?=$this->sel[2];?>><span><?=$this->news;?></span></a></li>
<li><a href="index.php?menu=3"<?=$this->sel[3];?>><span><?=$this->area;?></span></a></li>
<li><a href="index.php?menu=4"<?=$this->sel[4];?>><span><?=$this->links;?></span></a></li>
<li><a href="index.php?menu=5"<?=$this->sel[5];?>><span><?=$this->contact;?></span></a></li>
<li><a href="index.php?menu=6"<?=$this->sel[6];?>><span><?=$this->user;?></span></a></li>
</ul>
</div>