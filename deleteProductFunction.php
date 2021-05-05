<?php 

require_once 'vendor/autoload.php';

$productDao = new \App\Models\ProductDao();

$productDao->delete($_POST['id']);

header("Location: listProducts.php");
die();