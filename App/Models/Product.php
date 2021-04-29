<?php

namespace App\Models;

class Product {

    private $id, $name, $code, $price;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->preco = $preco;
    }
}