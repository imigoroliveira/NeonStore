<?php
    require_once '../../models/ProductModel.php';
    require_once '../../controllers/ProductController.php';

    $action = isset($_POST['action']) ? $_POST['action'] : null;

    if ($action == 'delete') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id) {
            $productController = new ProductController();
            $productController->deleteProduct($id);
            echo "Produto excluído com sucesso!";
        }
    }
?>