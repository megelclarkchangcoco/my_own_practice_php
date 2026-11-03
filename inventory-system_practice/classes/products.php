<?php 
require_once __DIR__ . "/../includes/dbh.inc.php";

class products extends dbh {

    public function addProduct($productID, $productName, $quantity, $price){
        $sql = "INSERT INTO products (product_id, product_name, quantity, price) VALUES (?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$productID, $productName, $quantity, $price]);
    }

    public function getProducts(){
        $sql = "SELECT * FROM products";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getSingleProduct($id){
        $sql = "SELECT * FROM products
                WHERE id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct(
        $id,
        $productId,
        $productName,
        $quantity,
        $price
    )
    {
        $sql = "UPDATE products
                SET product_id = ?,
                    product_name = ?,
                    quantity = ?,
                    price = ?
                WHERE id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([
            $productId,
            $productName,
            $quantity,
            $price,
            $id
        ]);
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM products
                WHERE id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);
    }

}


?>