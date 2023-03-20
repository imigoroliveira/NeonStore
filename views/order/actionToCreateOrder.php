<?php

require_once '../controllers/OrderController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
    $idsProducts = $_POST['id_products'];
    die($idProducts);
    foreach ($idsProducts as $idProduct) {
        // código para adicionar o produto ao carrinho
    }
    
    // redireciona para a página do carrinho
    header('Location: /carrinho');
    exit;
}
?>