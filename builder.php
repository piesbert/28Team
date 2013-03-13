<?php
/* File: builder.php
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

abstract class Builder {
    private $element;
    
    public function __construct(Element $element) {
        $this->element = $element;
    }
    
    final public function nest(Element $element) {
        $this->element->nest($element);
    }
    
    final public function getText($id) {
        return $GLOBALS['lang'][$id];
    }
    
    abstract public function build();
}