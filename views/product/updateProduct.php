<?php

require_once '../../controllers/ProductController.php';
require_once '../../models/ProductModel.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $value = $_POST['value'];
    $stock = $_POST['stock'];
    $image = $_FILES['image'];

    if(!empty($_FILES['image'])) {
        $controller = new ProductController($conn);
        $product = $controller->getProductById($id);
        $image = $product->getImage();
    }

    $product = new ProductModel();
    $product->setId($id);
    $product->setDescription($description);
    $product->setValue($value);
    $product->setStock($stock);

    $controller = new ProductController();
  

    $controller->updateProduct($product, $image);
    var_dump("chegou");

    header('Location: index.php');
    exit();
}

?>