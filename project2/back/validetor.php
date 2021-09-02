<?php
include "dbcont.php";
session_start();
$erorrs;
class validetor
{
    public function chickEmail($email)
    {
        global $cont;
        $chickEmail = $cont->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
        $chickEmail->execute([$email]);
        return $chickEmail->fetchAll();
    }

    public function chackName($name)
    {
        global $cont;
        $chickName = $cont->prepare("SELECT name FROM users WHERE name=? LIMIT 1");
        $chickName->execute([$name]);
        return $chickName->fetchAll();
    }
}