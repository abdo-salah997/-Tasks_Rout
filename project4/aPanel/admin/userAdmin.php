<?php

include '../back/AuthController.php';

session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin = new AuthController();

    $userEmail = $admin->chickAdminEmail($email);

    if($userEmail){

        $userData = $admin->chickAdminPassword($email,$password);

        if($userData){
            $_SESSION['name'] =$userData['name'];
            header("Location:../index/index.php");
        }else
        {
            $_SESSION['erorr'] = "The password is incorrect";
            header("Location:../index.php");

        }

    }
    else
    {
        session_start();
        $_SESSION['erorr'] = "The Email Is Not Found";
        header("Location:../index.php");
    }

}

