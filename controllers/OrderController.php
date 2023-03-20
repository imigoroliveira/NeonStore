<?php 

require_once '../../models/OrderModel.php';
require_once 'ProductController.php';
include_once '../../config/db.php';


class OrderController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }




    public function listOrders() {
        $productController = new ProductController();
        $stmt = $this->conn->prepare("SELECT * FROM orders");
        $stmt->execute();

        $orders = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $order = new OrderModel();
            $product = $productController->getProductById($row['product_id']);

            $order->setId($row['id']);
            $order->setProductId($product->getDescription());
            $order->setQuantity($row['quantity']);
  

            $orders[] = $order;
        }

        return $orders;
    }

    public function deleteOrder($id) {
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = :id");

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    public function createOrder($items){
        $stmt = $this->conn->prepare("INSERT INTO orders WHERE id = :id");

        $stmt->bindValue(':id', $items);

        $stmt->execute(); 
    }
     



}

?>