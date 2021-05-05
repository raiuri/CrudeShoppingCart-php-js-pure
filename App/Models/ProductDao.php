<?php

namespace App\Models;

class ProductDao {
    
    public function create(Product $p) {
        $sql = 'INSERT INTO products (name, code, price, image) VALUES (?,?,?,?)';

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $p->getName());
        $stmt->bindValue(2, $p->getCode());
        $stmt->bindValue(3, $p->getPrice());
        $stmt->bindValue(4, $p->getImage());
        $stmt->execute();
    }

    public function read() {
        $sql = 'SELECT * FROM products';

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0): 
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        else:
            return [];
        endif;
    }

    public function update(Product $p) {
        $sql = 'UPDATE products SET 
                name = ?,
                code = ?,
                price = ?
                WHERE id = ?
                ';
        
        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $p->getName());
        $stmt->bindValue(2, $p->getCode());
        $stmt->bindValue(3, $p->getPrice());
        $stmt->bindValue(4, $p->getId());
        $stmt->execute();
    }

    public function delete($id) {
        $sql = 'DELETE FROM products where id = ?';

        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}