<?php
session_start();
require("../database/db.php");
class userController{

    private $conn;

    public function __construct(){
        $obj = new Database();
        $this->conn = $obj->connection();
    }

    function editData($data) {
        try {
            $response = [];
           
            $query = $this->conn->prepare("UPDATE tbl_user SET full_name=:full_name, phone=:phone, email=:email WHERE id=:id");
            $query->bindParam(':full_name', $data[0]["value"]);
            $query->bindParam(':phone', $data[1]['value']);
            $query->bindParam(':email', $data[2]['value']);
            $query->bindParam(':id', $_SESSION['id']);
    
            // Execute the query
            $result = $query->execute();
    
            if ($result) {
                $response["status"] = 202;
                $response["message"] = "User updated successfully";
            } else {
                $response["status"] = 404;
                $response["message"] = "User not updated";
            }
        } catch (PDOException $e) {
            $response["status"] = 500; // Internal Server Error
            $response["message"] = "Error: " . $e->getMessage();
        }
    
        echo json_encode($response);
        return $response;
    }
    
}

$frmData = json_decode(file_get_contents("php://input"), true);
// echo "<pre>";
// print_r($frmData);
// die;


if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "edituser"){
    // echo "<pre>";
    // print_r($frmData["data"]);
    // die;
    $obj = new userController();
    $obj->editData($frmData["data"]);
}