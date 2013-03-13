<?php
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