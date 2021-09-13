<?php
include 'dbcont.php';

$CategoryController = new CategoryController();
class CategoryController
{
    public static function getCatigory()
    {
        global $cont;
        $catigory = $cont->prepare("SELECT * FROM catigory");
        $catigory->execute();
        return $catigory;
    }

    static function getTypeCatigory($catigoryId)
    {
        global $cont;

        $getTypeCatigory = $cont->prepare('SELECT `name` FROM `catigory` WHERE `id`=?');
        $getTypeCatigory->execute([$catigoryId]);

        return $getTypeCatigory->fetch();
    }

    function chackNameCatigory($name)
    {
        global $cont;
        $chackNameCatigory =  $cont->prepare('SELECT * FROM `catigory` WHERE name=?');
        $chackNameCatigory->execute([$name]);

        return $chackNameCatigory->fetch();
    }


    function addCatigory($name)
    {

        global $cont;

        $addCatigory = $cont->prepare('INSERT INTO `catigory`(`name`) VALUES (?)');
        $addCatigory->execute([$name]);
        header('Location:../category/addCate.php');
    }

    function updateCatigory($name, $id)
    {
        global $cont;

        $updateCatigory = $cont->prepare('UPDATE `catigory` SET `name`=? WHERE `id`=?');
        $updateCatigory->execute([$name, $id]);
        header('Location:../category/updateCate.php');
    }

    function deleteCatigory($id)
    {
        global $cont;

        $deleteCatigory = $cont->prepare('DELETE FROM `catigory` WHERE `id`=?');
        $deleteCatigory->execute([$id]);
        header('Location:../category/updateCate.php');
    }
}

if (isset($_POST['submitCatigory'])) {

    $name =   $_POST['nameCat'];

    $chackName = $CategoryController->chackNameCatigory($name);
    
    if (!$chackName) {

        $CategoryController->addCatigory($name);
        
    } else {
        session_start();
        $_SESSION['error'] = 'The Catigory Name Is Found';
        header("Location:category/addCate.php");
    }
}

if (isset($_POST['updateCatigory'])) {
    $id = $_POST['editId'];
    $name = $_POST['nameCat'];

    $chackName = $CategoryController->chackNameCatigory($name);

    if (!$chackName) {

        $CategoryController->updateCatigory($name, $id);
    } else {
        session_start();
        $_SESSION['error'] = 'The Catigory Name Is Found';
        header("Location:../category/updateCate.php");
    }
}

if (isset($_POST['deleteCatigory'])) {

    $id = $_POST['deleteId'];

    $CategoryController->deleteCatigory($id);
}
