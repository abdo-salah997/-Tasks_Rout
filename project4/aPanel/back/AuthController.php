<?php

include 'dbcont.php';


class AuthController{
    function chickAdminEmail($email)
    {
        global $cont;

        $uEmail = $cont->prepare('SELECT `email` FROM `users` WHERE `email`=?');
        $uEmail-> execute([$email]);
        return $uEmail->fetchAll();

    }
    
    function chickAdminPassword($email,$password){

        global $cont;

        $userData = $cont->prepare('SELECT * FROM `users` WHERE `password`=?');
        $userData -> execute([$password]);
        return $userData->fetch();
    }
}
    