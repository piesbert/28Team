<?php
/* File: window.php
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

class Window extends Builder {
    public function __construct(Element $element) {
        parent::__construct($element);
    }
    
    public function build() {
        $body     = new Element('body');
        $builder  = new Element('div', array('class' => 'builder'));
        $window   = new Element('div', array('class' => 'window'));
        $login    = new Element('div', array('class' => 'login_panel'));
        $menu     = new Element('div', array('class' => 'main_menu_panel')); 
        
        $loginPanel = new LoginPanel($login);
        $loginPanel->build();
        
        $mainMenu = new MainMenu($menu);
        $mainMenu->build();
        
        $window->nest($this->flags());
        $window->nest($login);
        $window->nest($menu);
        
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
        $div    = new Element('div', array('class' => 'flags'));
        $pl     = new Element('a',   array('href' => 'index.php?lang=pl'));
        $img_pl = new Element('img', array('src' => 'images/flags/pl.png'));
        $en     = new Element('a',   array('href' => 'index.php?lang=en'));
        $img_en = new Element('img', array('src' => 'images/flags/en.png'));
        
        $pl->nest($img_pl);
        $en->nest($img_en);
        
        $div->nest($pl);
        $div->nest($en);
        
        return $div;
    }
    
    private function forgot() {
        $div  = new Element('div', array('class' => 'forgot'));
        $link = new Element('a',   array('href', 'index.php?action=forgot'));
        
        $link->nest($this->getText('LOGIN_PANEL_FORGOT'));
        
        $div->nest($link);
        
        return $div;   
    }
}
?>