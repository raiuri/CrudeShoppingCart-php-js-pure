<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>
</head>
<body>
    <h1>Cadastrar produto</h1>

    <?php 
        $product = new \App\Models\Product();
        $product->setName('Notebook');
        $product->setPrice(2.959);    
        $product->setCode('182293');
        
        $productDao = new \App\Models\ProductDao();
        $productDao->create($product);
    ?>
</body>
</html>