<?php

if (isset($_POST['signin'])) {
    include "function.php";

    $yourName = $_POST['your_name'];
    $yourPass = $_POST['your_pass'];
    $rememberMe = $_POST['remember-me'];

    $Validtor = new validetor;
    $chackName = $Validtor->chackName($name);

    if (!empty($chackName)) {
        $logIn = $cont->prepare("SELECT name password FROM users WHERE name=? AND password=? AND agree=?  LIMIT 1");
        $logIn->execute([$yourName, $yourPass, $rememberMe]);
        $userData = $logIn->fetch();

        if (!empty($userData)) {
            $_SESSION['adedd'] = "The User Is Found";
            header("Location:../index.php");
        } else {
            $_SESSION['erorr'] = "The password that you've is incorrect";
            $erorrs[] = $_SESSION['erorr'];
            header("Location:../index.php");
        }
    }
    $erorrs[] = "The email you entered isn't found";
    $_SESSION['erorr'] = $erorrs;
    header("Location:../index.php");
}
