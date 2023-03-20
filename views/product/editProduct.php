<?php
require_once '../../config/db.php';
require_once '../../controllers/ProductController.php';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $controller = new ProductController($conn);
    $product = $controller->getProductById($id);
} else {
    header('Location: index.php');
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/estilo.css">
    <title>Produtos - NeonStore</title>
</head>
<body>
    <?php 
        include_once('../../header.php');
        include_once('../../footer.php');    
    
    ?>
    
    <br> <br>
    <div class="text-center">
        <h1 class="font-weight-bold">Edicao de Produto</h1>
    </div>
    <br> <br>




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-10">
                <form action="updateProduct.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label class="sr-only" for="inlineFormInputName">Id:</label>
                            <input type="text" class="form-control" name="id" id="id"  value="<?php echo $product->getId() ?>" readonly >
                        </div>
                        <div class="col">
                            <label class="sr-only" for="inlineFormInputName">Descricao</label>
                            <input type="text" class="form-control" name="description" id="description" value="<?php echo $product->getDescription() ?>" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="sr-only" for="inlineFormInputName">Valor:</label>
                            <input type="text" class="form-control" name="value" id="value"  value="<?php echo $product->getValue() ?>" >
                        </div>
                        <div class="col">
                            <label class="sr-only" for="inlineFormInputName">Estoque:</label>
                            <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $product->getStock() ?>" >
                        </div>
                    </div>


                    <div class="form-group mt-3 text-center">
                        <label for="exampleFormControlFile1">Selecione uma imagem do produto:</label><br>
                        <img src="<?php echo '../../assets/images/' . $product->getImage() ?>" alt="Imagem do produto" class="img-thumbnail img-preview">
                        <input type="file" class="form-control-file mt-4" id="image" name="image">
                    </div>

                    <div class="col justify-content-center text-center mb-5 mt-5 ">
                        <input name="submit" type="submit" value="Atualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>




    </body>
</html>