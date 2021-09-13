<?php
include "dbcont.php";

 $experince  = new ExperinceController();

if (isset($_POST['submitExperince'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $company = $_POST['company'];
    $description = $_POST['description'];

    $experince->addExperince($title, $year, $company, $description);
    echo "yes";
}

if (isset($_POST['submitEidt'])) {

    $id = $_POST['editId'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $company = $_POST['company'];
    $description = $_POST['description'];

    $experince->editExperince($title, $year, $company, $description,$id);
}
if (isset($_POST['submitDelete'])) {

    $id = $_POST['deleteId'];

    $experince->deleteExperince($id);
}


class ExperinceController
{

    function addExperince($title, $year, $company, $description)
    {
        global $cont;

        $addExperience = $cont->prepare("INSERT INTO `experience`( `title`, `year`, `company`, `descraption`) VALUES (?,?,?,?)");
        if ($addExperience->execute([$title, $year, $company, $description])) {

            header("Location:../experince/addExperince.php");
        }
    }

    function editExperince($title, $year, $company, $description,$id){
        global $cont;

        $editEducation = $cont->prepare("UPDATE `experience` SET `title`=? ,`year`=? ,`company`=?,`descraption`=? WHERE `id`=? ");
        if($editEducation->execute([$title, $year, $company, $description,$id])){
            
            header("Location:../experince/viewExperince.php");

        }
    }

    function deleteExperince($id){
        global $cont;
        $deleteExperince = $cont->prepare("DELETE FROM `experience` WHERE `id`=?");
        if($deleteExperince->execute([$id])) {
            header("Location:../experince/viewExperince.php");
        }
    }
}
