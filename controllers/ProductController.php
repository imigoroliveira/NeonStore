<?php 
ini_set('max_execution_time', 300); // Set maximum execution time to 300 seconds (5 minutes)
ini_set('memory_limit', '1024M');

require_once '../../models/ProductModel.php';
require_once '../../models/ImageModel.php';
include_once '../../config/db.php';


class ProductController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    
    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");

        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $product = new ProductModel();

            $product->setId($row['id']);
            $product->setDescription($row['description']);
            $product->setValue($row['value']);
            $product->setStock($row['stock']);
            $product->setimage($row['image']);

            return $product;
        }

        return null;
    }


    public function listProducts() {
        $stmt = $this->conn->prepare("SELECT * FROM products");

        $stmt->execute();

        $products = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = new ProductModel();

            $product->setId($row['id']);
            $product->setDescription($row['description']);
            $product->setValue($row['value']);
            $product->setStock($row['stock']);
            $product->setImage($row['image']);

            $products[] = $product;
        }

        return $products;
    }



    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }



    public function saveProduct(ProductModel $product) {
        $stmt = $this->conn->prepare("INSERT INTO products (description, value, stock, image) VALUES (:description, :value, :stock, :image)");

        $stmt->bindValue(':description', $product->getDescription());
        $stmt->bindValue(':value', $product->getValue());
        $stmt->bindValue(':stock', $product->getStock());
        $stmt->bindValue(':image', $product->getImage());

        $stmt->execute();

        $product->setId($this->conn->lastInsertId());

        return $product;
    }


    public function update($id) {
        $product = new ProductModel();
        $product->setId($id);
        $product->setDescription($_POST['description']);
        $product->setValue($_POST['VALUE']);
        $product->setStock($_POST['STOCK']);

        if(isset($_FILES['images'])) {
            $images = $_FILES['images'];

            foreach($images['tmp_name'] as $key => $tmp_name) {
                $filename = $images['name'][$key];
                $tmp_path = $tmp_name;
                $new_path = 'uploads/' . $filename;
                move_uploaded_file($tmp_path, $new_path);
                
                $image = new ImageModel();
                $image->setId($id);
                $image->setProductId($product->setId($id));
                $image->setFilename($filename);

            }
        }

        header('Location: index.php?controller=products&action=index');
    }
 

}

?>