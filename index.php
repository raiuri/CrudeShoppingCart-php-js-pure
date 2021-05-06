<?php 
    require_once 'vendor/autoload.php';

    $product = new \App\Models\ProductDao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> 
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <title>Products</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOJA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="createProduct.php">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listProducts.php">Lista de produtos (Editar)</a>
                        </li>
                    </ul>
                <form class="d-flex" action="/checkout.php">
                    <input class="form-control me-2" type="search" placeholder="buscar" aria-label="Search">
                    <ul>                    
                        <li class="cart-menu">
                            <div class="btn btn-success" id="qtd-products"><span>0</span><i class="fas fa-shopping-cart"></i></div>
                            <div id="cart">
                                <button class="btn btn-info">Total: R$<span id="total-cart"></span></button>
                                <table class="table" id="cart-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">imagem</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="clear-cart" class="button btn btn-danger">Limpar carrinho</a>
                            </div>
                        </li>
                    </ul>
                </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid" id="add-to-cart">
        <div class="row" id="items-list">
        <?php 
            $length = count($product->read());
            if($length > 0) { ?>
            <!-- -->
            <?php  
                foreach($product->read() as $product):
            ?>
                <div class="col-md-3">
                    <div class="container card" style="width: 19rem;">
                        <img src="<?php echo $product["image"] ?>" height="250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product["name"] ?></h5>
                            <p class="card-text"><?php echo $product["price"] ?></p>
                            <strong>código: <?php echo $product["code"] ?></strong>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success add-to-cart" onclick="incrementQtdProducts(), incrementTotalCart()">Comprar</button>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach; 
            ?>
            <!-- -->
        <?php } else {?>
            <?php echo "Não há produtos cadastrados" ?>
        <?php };?>
        </div>
    </div>
    <script src="public/js/cart.js"></script>
</body>
</html>