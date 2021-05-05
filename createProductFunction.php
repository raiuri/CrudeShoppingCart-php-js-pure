<?php 

require_once 'vendor/autoload.php';

$product = new \App\Models\Product();
$product->setName($_POST['name']);
$product->setPrice($_POST['code']);
$product->setCode($_POST['price']);
$product->setImage($_POST['image']);
       
$productDao = new \App\Models\ProductDao();
$productDao->create($product);

header("Location: create.php");
die();