<form action="index.php" class="registration_form" method="post">
<ul class="registration_info">
<li><span><?=$this->reginfo01;?></span></li>
<li><span><?=$this->reginfo02;?></span></li>
<li><span><?=$this->reginfo03;?></span></li>
</ul>
<input type="hidden" name="action_register" value="true" />
<span><?=$this->username;?>:</span><br/>
<input type="text" class="<?=$this->class_username;?>" name="registration_username" value="<?=$this->v_username;?>" /><br/>
<?=$this->error_username;?>
<span><?=$this->password;?>:</span><br/>
<input type="password" class="<?=$this->class_password1;?>" name="registration_password" value="" /><br/>
<?=$this->error_password1;?>
<span><?=$this->rentpass;?>:</span><br/>
<input type="password" class="<?=$this->class_password2;?>" name="registration_reenter_password" value="" /><br/>
<?=$this->error_password2;?>
<span><?=$this->email;?>:</span><br/>
<input type="text" class="<?=$this->class_email1;?>" name="registration_email" value="<?=$this->v_email;?>" /><br/>
<?=$this->error_email1;?>
<span><?=$this->rentemail; ?>:</span><br/>
<input type="text" class="<?=$this->class_email2;?>" name="registration_reenter_email" value="<?=$this->v_rentemail;?>" /><br/>
<?=$this->error_email2;?>
<span><?=$this->firstname;?>:</span><br/>
<input type="text" class="registration_text_field" name="registration_firstname" value="<?=$this->v_firstname;?>" /><br/>
<span><?=$this->lastname;?>:</span><br/>
<input type="text" class="registration_text_field" name="registration_lastname" value="<?=$this->v_lastname;?>" /><br/>
<input type="submit" value="<?=$this->register;?>" id="registration_submit_button" />
</form>