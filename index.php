<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <title>Home - NeonStore</title>
</head>
<body>
    <?php include_once("./header.php") ?>

    <div class="text-center mt-5 mb-1">
        <h1 class="font-weight-bold">Bem vindo(a) a Neon Store: a sua loja gamer!</h1>
    </div>
<div class="row">
    <div class="d-flex justify-content-center">
        <div id="meu-carrossel" class="carousel slide" data-bs-ride="carousel" data-interval="1000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/images/pc1.jpg" class="d-block mx-auto" height="400px" width="800px" alt="Imagem 1">
                </div>
                <div class="carousel-item">
                <img src="assets/images/pc4.jpg" class="d-block mx-auto" height="400px" width="800px" alt="Imagem 2">
                </div>
                <div class="carousel-item">
                <img src="assets/images/pc3.jpg" class="d-block mx-auto"  height="400px" width="800px" alt="Imagem 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#meu-carrossel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#meu-carrossel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </a>
        </div>
    </div>
</div>
    
    <?php include_once("./footer.php") ?>

</body>
</html>