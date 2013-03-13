<?php
/* File: head.php
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

class Head extends Builder {
    private $element = null;
    private $keywords = '28team, geocaching, opencaching, geocoin, geocoins, travelbug, travelbugs, geokret, geokrety';
    private $pageTitle = '28Team.pl';
    
    public function __construct(Element $element) {
         parent::__construct($element);
    }
    
    public function build() {
        $this->prepareMeta();
        $this->prepareTitle();
        $this->prepareLinks();
    }
    
    private function prepareMeta() {
        $meta = new Element('meta');
        $meta->set('http-equiv', 'Content-Type');
        $meta->set('content', 'text/html; charset=utf-8');
        $this->nest($meta);
        
        $meta = new Element('meta');
        $meta->set('keywords', $this->keywords);
        $this->nest($meta);
    }
    
    private function prepareTitle() {
        $title = new Element('title');
        $title->set('innerHtml', $this->pageTitle);
        $this->nest($title);
    }
    
    private function prepareLinks() {
        $link = new Element('link');
        $link->set('rel', 'shortcut icon');
        $link->set('href', 'images/favicon.ico');
        $this->nest($link);
        
        $link = new Element('link');
        $link->set('rel', 'stylesheet');
        $link->set('type', 'text/css');
        $link->set('media', 'screen,projection');
        $link->set('href', 'css/main.css');
        $this->nest($link);
    }
}