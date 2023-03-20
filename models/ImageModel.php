<?php
class ImageModel {
    private $id;
    private $product_id;
    private $filename;

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getFilename() {
        return $this->filename;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }
    
    public function setFilename($filename) {
        $this->filename = $filename;
    }
}
?>
