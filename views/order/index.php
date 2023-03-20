<?php
  require_once '../../config/db.php';
  require_once '../../controllers/OrderController.php';
  
  $controller = new OrderController($conn);
  $orders = $controller->listOrders();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="functions.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./../styles/estilo.css">
    <title>Pedidos - NeonStore</title>
</head>
<body>        
    <?php include_once("../../header.php") ?>
    <?php include_once("../../footer.php") ?>

    <div class="text-center mt-2">
        <h1 class="font-weight-bold">Listagem de Pedidos</h1>
</div>

    <div class="container mb-5  mt-2">
        <div class="row">
            <div class="col justify-content-center text-center mb-5">
                <a href="createOrder.php"> <button type="button" class="btn btn-secondary" >Adicionar produto</button></a>    
            </div>
            <div class="row justify-content-center">
            <div class="col-md-2 col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id do Pedido:</th>
                            <th>Produto:</th>
                            <th>Quantidade</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?= $order->getId() ?></td>
                                <td><?= $order->getProductId() ?></td>
                                <td><?= $order->getQuantity() ?></td>
                                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"  onclick="setModalData(<?php echo $order->getId() ?>)" data-bs-target="#modal_delete">Excluir Pedido</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      
    </div>

</body>
</html>  


   