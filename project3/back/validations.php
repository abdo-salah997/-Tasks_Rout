<?php

include "dbcont.php";

class validations{

    public function chickEmail($email){
        global $cont;
        $chickEmail = $cont->prepare("SELECT email FROM employee WHERE email=? LIMIT 1");
        $chickEmail->execute([$email]);
        return $chickEmail->fetchAll();
    }

    public function chickPone($phone){
        global $cont;
        $chickPhone = $cont->prepare("SELECT phone FROM employee WHERE phone=? LIMIT 1");
        $chickPhone->execute([$phone]);
        return $chickPhone->fetchAll();
    }
}