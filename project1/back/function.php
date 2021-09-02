<?php
include "dbcont.php";
session_start();
function chickEmail($email)
{
    global $cont;
    $chickEmail = $cont->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
    $chickEmail->execute([$email]);
    return $chickEmail->fetchAll();
}