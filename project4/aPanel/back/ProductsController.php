<?php
include "dbcont.php";

$product = new ProductsController();

class ProductsController
{
    static function getProducts()
    {
        global $cont;

        $getProducts = $cont->prepare('SELECT * FROM `products`');
        $getProducts->execute();

        return $getProducts;
    }
    public function addProduct($categoryId, $imageUrl, $name, $slug)
    {
        global $cont;

        $addProduct = $cont->prepare('INSERT INTO `products`(`category-id`, `img`, `title`, `slage`) VALUES (?,?,?,?)');
        if ($addProduct->execute([$categoryId, $imageUrl, $name, $slug])) {
            session_start();
            $_SESSION['done'] = "Product updated";
            header("Location:../products/addProduct.php");
        }
    }
    public function updateProduct($name, $slug, $categoryId, $imageUrl, $id)
    {
        global $cont;

        $updateProduct = $cont->prepare('UPDATE `products` SET `title`=?,`slage`=? , `category-id`=?,`img`=? WHERE `id`=?');
        if ($updateProduct->execute([$name, $slug, $categoryId, $imageUrl, $id])) {
            session_start();
            $_SESSION['done'] = "Product updated";
            header("Location:../products/viewProducts.php");
        }
    }
    public function deleteProduct($id)
    {
        global $cont;

        $deleteProduct = $cont->prepare('DELETE FROM `products` WHERE `id`=?');
        $deleteProduct->execute([$id]);
        header("Location:../products/viewProducts.php");

    }
    public function moveImage($image)
    {
        $imageType = $image['type'];
        $imageTmpName = $image['tmp_name'];

        $imageTypeArray = explode('/', $imageType);

        $validate = $this->validateImage($imageTypeArray[1], ['png', 'jpeg', 'jpg']);
        var_dump($validate);

        if ($validate) {
            // var_dump($validate);
            $newImageName = 'about_' . time() . '.' . $imageTypeArray[1];
            $path = realpath("../../Images") . '/'  . $newImageName;
            move_uploaded_file($imageTmpName, $path);
            return $newImageName;
        } else {
            session_start();
            $_SESSION['error'] = "Upload Correct File";
            // header("Location:../products/addProduct.php");
        }
    }

    private function validateImage($type, $allowTypes)
    {

        if (in_array($type, $allowTypes)) {
            return true;
        }
        return false;
    }
}
if (isset($_POST['addProduct'])) {

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $categoryId = $_POST['categoryId'];
    $image = $_FILES['image'];

    $imageUrl = $product->moveImage($image);

    $product->addProduct($categoryId, $imageUrl, $name, $slug);
}
if (isset($_POST['updateProduct'])) {

    $id = $_POST['editId'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $categoryId = $_POST['CategoryId'];
    $oldImage = $_POST['oldImage'];
    $image = $_FILES['image'];

    if (!empty($image['name'])) {
        $imageUrl = $product->moveImage($image);
    } else {
        $imageUrl = $oldImage;
    }

    $product->updateProduct($name, $slug, $categoryId, $imageUrl, $id);
}

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['deleteId'];

    $product->deleteProduct($id);
}
