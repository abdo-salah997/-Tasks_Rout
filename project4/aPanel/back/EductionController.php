<?php
include "dbcont.php";

$eduction = new EductionController();

if (isset($_POST['submitEduction'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $university = $_POST['university'];
    $description = $_POST['description'];
    $eduction->addEduCtion($year , $title , $university, $description);
}

if (isset($_POST['submitEidt'])) {

    $id = $_POST['editId'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $university = $_POST['university'];
    $description = $_POST['description'];

    $eduction->editEduCtion($title, $year, $university, $description,$id);
}
if (isset($_POST['submitDelete'])) {

    $id = $_POST['deleteId'];

    $eduction->deleteEduCtion($id);
}


class EductionController
{

    function addEduCtion($title, $year, $university, $description)
    {
        global $cont;

        $addEduction = $cont->prepare("INSERT INTO `eduction`(`year`, `title`, `universty`, `descraption`) VALUES (?,?,?,?)");
        if ($addEduction->execute([$title, $year, $university, $description])) {

            header("Location:../education/addEdu.php");
        }
    }

    function editEduCtion($title, $year, $university, $description,$id){
        global $cont;

        $editEducation = $cont->prepare("UPDATE `eduction` SET `title`=? ,`year`=? ,`universty`=?,`descraption`=? WHERE `id`=? ");
        if($editEducation->execute([$title, $year, $university, $description,$id])){
            
            header("Location:../education/viewEdu.php");

        }
    }

    function deleteEduCtion($id){
        global $cont;
        $deleteEducation = $cont->prepare("DELETE FROM `eduction` WHERE `id`=?");
        if($deleteEducation->execute([$id])) {
            header("Location:../education/viewEdu.php");
        }
    }
}
