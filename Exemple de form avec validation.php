<?php
class acontroller{
.
.
.
private function loginformAction()
{
    $this->actionform='loginform';
    $this->errorMsg=array();
    if(isset($post)){
        if(empty($post('aliasName'))){
        }else{
        }
        if(empty($post('password'))){
        
        }
        if(empty($post('re_password'))){
        }
        if(!empty($post('password')) && isset($post('re_password')) ){
        }
    }

    $this->render();
}

 }   