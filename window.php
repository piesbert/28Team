<?php

class Window extends Builder {
    public function __construct(Element $element) {
        parent::__construct($element);
    }
    
    public function build() {
        $body = new Element('body');
        
        $builder = new Element('div');
        $builder->set('class', 'builder');
        
        $window = new Element('div');
        $window->set('class', 'window');
        
        $window->nest($this->flags());
        $window->nest($this->loginPanel());
        
        $builder->nest($window);
        $builder->nest($this->vimPowered());
        
        $body->nest($builder);
        $this->nest($body);
    }
    
    private function vimPowered() {
        $div  = new Element('div', array('class' => 'vim_powered'));
        $link = new Element('a',   array('href' => 'http://www.vim.org', 'target' => '_blank'));
        $img  = new Element('img', array('src' => 'images/vim_powered.png', 'align' => 'right'));
        
        $link->nest($img);
        
        $div->nest($link);
        
        return $div;
    }
    
    private function loginPanel() {
        $div = new Element('div', array('class' => 'login_background'));
        
        $div->nest($this->loginForm()); 
        $div->nest($this->forgot());   
            
        return $div;
    }
    
    private function loginForm() {
        // TODO: Make all functions like this one
        $div      = new Element('div',   array('class' => 'login_form'));
        $form     = new Element('form',  array('action' => 'index.php', 'method' => 'post'));
        $hidden   = new Element('input', array('type' => 'hidden', 'name' => 'action_login', 'value' => 'true'));
        $username = new Element('input', array('type' => 'text', 'name' => 'login_form_login', 'id' => 'text_field', 'size' => '10'));
        $password = new Element('input', array('type' => 'password', 'name' => 'login_form_password', 'id' => 'text_field', 'size' => '10'));
        $submit   = new Element('input', array('type' => 'submit', 'value' => $this->getText('LOGIN_PANEL_LOGIN'), 'id' => 'submit_button'));
        
        $form->nest($hidden);
        $form->nest($this->getText('LOGIN_PANEL_USERNAME') . ":&nbsp;");
        $form->nest($username);
        $form->nest("&nbsp;" . $this->getText('LOGIN_PANEL_PASSWORD') . ":&nbsp;");
        $form->nest($password);
        $form->nest("&nbsp;");
        $form->nest($submit);
        
        $div->nest($form);
        
        return $div;
    }
    
    private function flags() {
        $div = new Element('div');
        $div->set('class', 'flags');
        
        $pl = new Element('a');
        $pl->set('href', 'index.php?lang=pl');
        
        $img_pl = new Element('img');
        $img_pl->set('src', 'images/flags/pl.png');
        
        $pl->nest($img_pl);
        
        $en = new Element('a');
        $en->set('href', 'index.php?lang=en');
        
        $img_en = new Element('img');
        $img_en->set('src', 'images/flags/en.png');
        
        $en->nest($img_en);
        
        $div->nest($pl);
        $div->nest($en);
        
        return $div;
    }
    
    private function forgot() {
        $div = new Element('div');
        $div->set('class', 'forgot');
        
        $link = new Element('a');
        $link->set('href', 'index.php?action=forgot');
        $link->nest($this->getText('LOGIN_PANEL_FORGOT'));
        
        $div->nest($link);
        
        return $div;   
    }
}
?>