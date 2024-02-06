<?php  
require('./database/db.php');

class productController {
    private $conn;

    public function __construct() {
        $obj = new Database();
        $this->conn = $obj->connection();
    }

    function select() {
        try {
            $query = $this->conn->prepare("SELECT * FROM tbl_product");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";

            echo json_encode($result);
        } catch (PDOException $e) {
            // Handle database errors
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}

$frmData = json_decode(file_get_contents("php://input"), true);
// echo "<pre>";
// print_r($frmData);
if(isset($_POST)) {
    $obj = new productController();
    $obj->select();
}

