<?php

if (isset($_POST['submitLogin'])) {
    include "function.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailValidtor = chickEmail($email);

    if (!empty($emailValidtor)) {
        $logIn = $cont->prepare("SELECT email password FROM users WHERE email=? AND password=? LIMIT 1");
        $logIn->execute([$email,$password]);
        $userData = $logIn->fetch();

        if(!empty($userData)){
            $_SESSION['adedd'] = "The User Is Found";
            header("Location:../index.php");
        }else
        {
            $_SESSION['erorr'] = "The password that you've is incorrect";
            header("Location:../index.php");
            
        }
    }
    else{
        $_SESSION['erorr'] = "The email you entered isn't found";
        header("Location:../index.php");
    }
}
