<?php
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