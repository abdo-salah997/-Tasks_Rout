<?php

if (isset($_POST['submitRigester'])) {
    include "function.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $emailValidtor = chickEmail($email);

    if (empty($emailValidtor)) {

        $addUser = $cont->prepare("INSERT INTO users ( name, email, password) VALUES (?,?,?)");
        if ($addUser->execute([$name, $email, $password])) {
            $_SESSION['adedd'] = "Add Email Sucsess";
            header("Location:../index.php");
        }
    }

    $_SESSION['erorr'] = "The Email Is Found";
    header("Location:../index.php");
}
