<?php
  require_once '../../config/db.php';
  require_once '../../controllers/ProductController.php';
  
  $controller = new ProductController($conn);
  $products = $controller->listProducts();
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
    <title>Produtos - NeonStore</title>
</head>
<body>        
    <?php include_once("../../header.php") ?>
    <?php include_once("../../footer.php") ?>

    <div class="text-center mt-2">
        <h1 class="font-weight-bold">Listagem de Produtos</h1>
    </div>

    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="modal_delete" aria-hidden="true">
        <form action="ProductController.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_delete">Confirmacao de Exclusao</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir o produto <span id="description"></span>? </p>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" id="id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" onclick="deleteProduct()"  class="btn btn-danger">EXCLUIR PRODUTO</button>
                </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container mb-5  mt-2">
        <div class="row">
            <div class="col justify-content-center text-center mb-5">
                <a href="createProduct.php"> <button type="button" class="btn btn-secondary">Adicionar produto</button></a>    
            </div>
            <div class="row justify-content-center">
            <div class="col-md-2 col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Estoque</th>
                            <th>Imagem</th>
                            <th>Editar</th>
                            <th>Excluir</th>
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
                                <td><a href="./editProduct.php?id=<?= $product->getId()?>"><button type="button" class="btn btn-secondary">Editar Produto</button></a></td>
                                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="setModalData(<?php echo $product->getId() ?>, '<?php echo $product->getDescription() ?>')" data-bs-target="#modal_delete">Excluir Produto</button></td>
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


   