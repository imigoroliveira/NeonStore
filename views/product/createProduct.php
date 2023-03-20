
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
        <h1 class="font-weight-bold">Cadastro de Produtos</h1>
    </div>
    <br> <br>

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form method="POST" action="index.php?action=create">
                <div class="col-sm-3 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Id:</label>
                    <input type="text" class="form-control" id="inlineFormInputName" readonly placeholder="XX">
                </div>
                <div class="col-sm-3 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Descricao</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Descricao do produto" >
                </div>
                <div class="col-sm-3 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Valor:</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Descricao do produto" >
                </div>
                <div class="col-sm-3 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Estoque:</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Estoque do produto" >
                </div>
                <div class="form-group mt-1">
                    <label for="exampleFormControlFile1">Selecione uma imagem do produto:</label><br>
                    <input type="file" class="form-control-file mt-1" id="exampleFormControlFile1">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Cadastrar produto</button>
            </form>
            </div>
        </div>
    </div>

   
</body>
</html>