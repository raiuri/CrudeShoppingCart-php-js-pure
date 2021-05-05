<?php 

require_once 'vendor/autoload.php';

$product = new \App\Models\Product();
$product->setName($_POST['name']);
$product->setPrice($_POST['price']);
$product->setCode($_POST['code']);
$product->setImage($_POST['image']);
       
$productDao = new \App\Models\ProductDao();
$productDao->create($product);

header("Location: createProduct.php");
die();