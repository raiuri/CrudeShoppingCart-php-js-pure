<?php

require_once 'vendor/autoload.php';

$product = new \App\Models\Product();
$productDao = new \App\Models\ProductDao();

$product->setId($_POST['id']);
$product->setName($_POST['name']);
$product->setPrice($_POST['price']);
$product->setCode($_POST['code']);
$product->setImage($_POST['image']);

$productDao->update($product);

header("Location: listProducts.php");
die();