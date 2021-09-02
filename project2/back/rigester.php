<?php

if (isset($_POST['signup'])) {

    include "validetor.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $rePass = $_POST['re_pass'];
    $agreeTerm = $_POST['agree-term'];

    $Validtor = new validetor;
    $chickEmail = $Validtor->chickEmail($email);
    $chackName = $Validtor->chackName($name);


    if (count($chackName) == 0) {
        if (count($chickEmail) == 0) {
            if ($rePass == $password) {
                $addUser = $cont->prepare("INSERT INTO users ( name, email, password,agree) VALUES (?,?,?,?)");
                if ($addUser->execute([$name, $email, $password, $agreeTerm])) {
                    $_SESSION['adedd'] = "Add Email Sucsess";
                    header("Location:../index.php");
                }
            }
            $erorrs[] = "Those passwords didn’t match";
            $_SESSION['erorr'] = $erorrs;
            header("Location:../index.php");
        }else
        {
        $erorrs[] = "The Email Is Found";
        $_SESSION['erorr'] = $erorrs;
        header("Location:../index.php");
        }
    } else
    {
        $erorrs[] = "The Name Is Found";
        $_SESSION['erorr'] = $erorrs;
        header("Location:../index.php");
    }
}
