<?php
  require_once '../../config/db.php';
  require_once '../../controllers/OrderController.php';
  require_once '../../controllers/ProductController.php';

  
  $controller = new ProductController($conn);
  $products = $controller->listProducts();
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
        <h1 class="font-weight-bold">Criacao de Pedido</h1>
    </div>


    <div class="row">
      <div class="col text-center text-">
        <p>Produtos no carrinho:</p> 
        <p id="count" class="font-weight-bold">0</p>
      </div>
    </div>

    <div class="col justify-content-center text-center mb-5">
            <form method="POST" action="actionToCreateOrder.php?action=create">
                <button type="button"  onclick="createOrder()" class="btn btn-secondary">Criar Pedido</button>    
            </form>     
    </div>


    <table class="table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Estoque</th>
              <th>Imagem</th>
              <th>Quantidade</th>
              <th>Acao</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($products as $product) { ?>
              <tr>
                  <td><?= $product->getId() ?></td>
                  <td><?= $product->getDescription() ?></td>
                  <td><?= $product->getValue() ?></td>
                  <td><?= $product->getStock() ?></td>
                  <td><img src="../../assets/images/<?= $product->getImage() ?>" class="imagemcel" ></td>
                  <td> <p id="qnt">0</p></td>
                  <td><button type="button" class="btn btn-secondary" onclick="addProduct(<?= $product->getId()?>)" >Adicionar Produto</button></td>
              </tr>
          <?php } ?>
      </tbody>
    </table>

</body>
</html>  


   