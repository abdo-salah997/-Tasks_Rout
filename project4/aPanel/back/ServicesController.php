<?php
include 'dbcont.php';

$services = new ServicesController();
class ServicesController
{
    public function addServices($name, $description, $imageUrl)
    {

        global $cont;
        session_start();

        $addService = $cont->prepare("INSERT INTO `service`(`name`, `descraption`, `img`) VALUES (?,?,?)");
        if ($addService->execute([$name, $description, $imageUrl])) {
            $_SESSION['done'] = "Service Was Added";
            header("Location:../services/addServices.php");
        }
    }
    public function updateServices($name, $description, $imageUrl, $id)
    {
        global $cont;
        $service = $cont->prepare("UPDATE service SET `name`=?, descraption=?, img=? WHERE id=?");
        if ($service->execute([$name, $description, $imageUrl, $id])) {
            $_SESSION['done'] = "Service updated";
            header("Location:../services/viewServices.php");
        }
    }
    public function moveImage($image)
    {
        session_start();

        $imageType = $image['type'];
        $imageTmpName = $image['tmp_name'];
        $imageTypeArray = explode('/', $imageType);

        $validtionImg = $this->validationIamge($imageTypeArray[1], ['png', 'jpeg', 'jpg']);

        
        if ($validtionImg) {
            $newImgeName = time() . $image['name'];
            $path = realpath('../../Images') . '/' . $newImgeName;
            move_uploaded_file($imageTmpName, $path);
            return $newImgeName;
        } else {
            $_SESSION['error'] = "Upload Correct File";
            header("Location:../services/viewServices.php");
        }
    }

    private function validationIamge($getType, $allowType)
    {   

        if (in_array($getType, $allowType)) {

            return true;
        }
        return false;
    }

    public static function getServices()
    {
        global $cont;

        $getServices = $cont->prepare("SELECT * FROM `service`");
        $getServices->execute();
        return $getServices;
    }
    public function deleteService($serviceId)
    {
        session_start();
        global $cont;

        $services = $cont->prepare("DELETE FROM service WHERE id=? LIMIT 1");
        if ($services->execute([$serviceId])) {
            $_SESSION['done'] = "service Was Deleted";
            header("Location:../services/viewServices.php");
        }
    }
}


if (isset($_POST['submitServices'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $imageUrl = $services->moveImage($image);

    $services->addServices($name, $description, $imageUrl);
}

if (isset($_POST['updateServiece'])) {
    $id = $_POST['editId'];
    $name = $_POST['name'];
    $description = $_POST['descraption'];
    $oldImage = $_POST['oldImage'];
    $image = $_FILES['image'];

    if(!empty($image['name'])){
    $imageUrl = $services->moveImage($image);
    }else
    {
        $imageUrl = $oldImage;
    }
    $services->updateServices($name, $description, $imageUrl, $id);
}

if(isset($_POST['deleteServiece'])){

    $Id = $_POST['serviceId'];

    $services->deleteService($Id);
}