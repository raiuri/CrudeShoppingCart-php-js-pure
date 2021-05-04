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
    <title>Products</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                <form class="d-flex" action="/checkout.php">
                    <input class="form-control me-2" type="search" placeholder="buscar" aria-label="Search">
                    <ul>                    
                        <li class="cart-menu">
                            <div class="btn btn-success" id="qtd-products">icone <span>0</span></div>
                            <div id="cart">
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
    <div class="container-fluid">
        <div class="row" id="items-list">
        <?php  
            foreach($product->read() as $product):
        ?>
            <div class="col-md-3">
                <div class="container card" style="width: 19rem;">
                    <img src="https://img.elo7.com.br/product/zoom/B37A62/abajur-todo-feito-em-ferro-artesanato.jpg" height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product["name"] ?></h5>
                        <p class="card-text">R$ <?php echo $product["price"] ?></p>
                        <strong>código: <?php echo $product["code"] ?></strong>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success add-to-cart" onclick="incrementQtdProducts()">Comprar</button>
                    </div>
                </div>
            </div>
        <?php 
            endforeach; 
        ?>
        </div>
    </div>
    <script src="public/js/cart.js"></script>
</body>
</html>