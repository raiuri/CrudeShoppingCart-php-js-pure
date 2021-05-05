<?php 
    require_once 'vendor/autoload.php';

    $product = new \App\Models\ProductDao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Lista de produtos</title>
</head>
<body>
    <h1 class="text-center">Lista de produtos</h1>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Código</th>
            <th scope="col">Preço</th>
            <th scope="col">Imagem</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            foreach($product->read() as $product):
        ?>
            <tr>
                <th scope="row"><?php echo $product['id'] ?></th>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['code'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo (strlen($product['image']) > 25 ? substr($product['image'], 0, 28).'...': $product['image']) ?></td>
                    <td>
                        <form action="editProduct.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="deleteProductFunction.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button class="btn btn-danger">Remover</button>
                        </form>
                    </td>
            </tr>
        <?php 
            endforeach; 
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>