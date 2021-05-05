<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Cadastrar produtos</title>
</head>
<body>
    <h1 class="text-center">Cadastrar produto</h1>

    <div class="container">
        <form action="createProductFunction.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do produto</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Código</label>
                <input type="text" class="form-control" id="code" name="code">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Url da imagem</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</body>
</html>