<?php
include_once('config.php');

class Main {
    public function __construct() {
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";    
    }
    
    public function start() {
        $html = new Element('html');
        $head = new Head($html);
        $window = new Window($html);
        
        $head->build();
        $window->build();
        echo $html;
    }
}

$main = new Main();
$main->start();

?>