<?php
    require_once '../../models/OrderModel.php';
    require_once '../../controllers/OrderController.php';

    $action = isset($_POST['action']) ? $_POST['action'] : null;
    var_dump($action);
    if ($action == 'delete') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id) {
            $orderController = new OrderController();
            $orderController->deleteOrder($id);
            echo "Produto excluído com sucesso!";
        }
    }
?>