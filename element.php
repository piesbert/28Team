<?php
/* File: element.php
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

class Element {
    private static $TEXT = 'innerHtml';
    
    private static $unitags = array('meta', 'base', 'link', 'img', 'br', 'hr', 'param', 'input', 'col');
    
    private $tag;
    private $nested;
    
    private $attributes;
    
    public function __construct($tag, $attributes = array()) {
        $this->tag = $tag;
        $this->nested = array();
        $this->attributes = $attributes;
    }
    
    public function __toString() {
        return $this->build();
    }
    
    public function set($key, $value = '') {
        $attributes = array();
        
        if (array_key_exists($key, $attributes)) {
            // use reset
        }
        else if (!is_array($key)) {
            $this->attributes[$key] = $value;
        }
        else {
            
            $this->attributes = array_merge($this->attributes, $key);
        }
    }
    
    public function nest($object) {
        if ('string' == gettype($object)) {
            $nested = new Element('span', array(self::$TEXT => $object));
        }
        else {
            $nested = $object;
        }
        
        $this->nested[] = $nested;
    }
    
    private function build() {
        $retval = "<" . $this->tag;
        
        if (count($this->attributes)) {
            foreach ($this->attributes as $key => $value) {
                if ($key !== self::$TEXT) {
                    $retval .= ' ' . $key . '="' . $value . '"';
                }
            }
        }
        
        // check if unitag
        if (in_array($this->tag, static::$unitags)) {
            $retval .= " />";
        }
        else {
            $retval .= ">";
            if (count($this->nested)) {
                foreach ($this->nested as $key => $value) {
                    $retval .= $value->build();
                }
            }
            else if (array_key_exists(self::$TEXT, $this->attributes)) {
                $retval .= $this->attributes[self::$TEXT];   
            }
            $retval .= "</" . $this->tag . ">";
            
            if ($this->tag == 'div') {
                $retval .= "\n";
            }
        }
        
        return $retval;
    }
    
}