<?php
include "validations.php";
session_start();

global $cont;
if (isset($_POST['submitAdd'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $validation = new validations();

    $chickEmail = $validation->chickEmail($email);

    if (empty($chickEmail)) {

        $chickPhone = $validation->chickPone($phone);
        if (empty($chickPhone)) {
            $AddEmployee = $cont->prepare("INSERT INTO employee( name, email, address, phone) VALUES (?,?,?,?)");
            $AddEmployee->execute([$name,$email,$address,$phone]);
            $_SESSION['success'] = "You added successfully";
            header("Location:../index.php");
            
        }else
        {
        $_SESSION['errors'] = "The Phone Is Found";
        header("Location:../index.php");
        }
    }else
    {
    $_SESSION['errors'] =  "The Email Is Found";
    header("Location:../index.php");
    }
}


if(isset($_POST['delete'])){
    $id = $_POST['deleteId'];
    $deleteUser = $cont->prepare("DELETE FROM `employee` WHERE `id`=?");
    $deleteUser->execute([$id]);
    header("Location:../index.php");
}

if(isset($_POST['update'])){
    $id = $_POST['updateId'];
    $nameUpdate = $_POST['nameUpdate'];
    $emailUpdate = $_POST['emailUpdate'];
    $addressUpdate = $_POST['addressUpdate'];
    $phoneUpdate = $_POST['phoneUpdate'];
    // echo $nameUpdate . "  " . $emailUpdate . "  " . $addressUpdate . "  " . $phoneUpdate;
    $updateUser = $cont->prepare("UPDATE `employee` SET `name`=?,`email`=?,`address`=?,`phone`=? WHERE id =?");
    $updateUser->execute([$nameUpdate,$emailUpdate,$addressUpdate,$phoneUpdate,$id]);
    header("Location:../index.php");
}
