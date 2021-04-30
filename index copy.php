<?php 

require_once 'vendor/autoload.php';

// create
// $product = new \App\Models\Product();
// $product->setName('Alface');
// $product->setPrice(2.99);    
// $product->setCode('182293');

// $productDao = new \App\Models\ProductDao();
// $productDao->create($product);


// read
$product = new \App\Models\ProductDao();

foreach($product->read() as $product):
    echo $product['name']."<br>";
endforeach;

// // // update
// $product = new \App\Models\Product();
// $product->setId(1);
// $product->setName('Brócolis');
// $product->setPrice(3.98);
// $product->setCode('828229');

// $productDao = new \App\Models\ProductDao();
// $productDao->update($product);

// delete
// $productDao = new \App\Models\ProductDao();
// $productDao->delete(3);

// foreach($productDao->read() as $product):
//     echo $product['name']."<br>".$product['price']."<br>"."<br>";
// endforeach;