<?php
session_start();
require("../database/db.php");
class collectionController{

    private $conn;

    public function __construct(){
        $obj = new Database();
        $this->conn = $obj->connection();
    }

    function select(){
        $query = $this->conn->prepare("SELECT * FROM tbl_collection");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
      
       echo  json_encode($result);
    }


    function insertData($data){
       
        echo "<pre>";
        print_r($data);

      
        $response = array();
        try{
            $collection_data = $data['collection_name'];
           
            
         
            
            $insertQuery = $this->conn->prepare("INSERT INTO tbl_collection (name) VALUES (:collection_data)");
            $insertQuery->bindParam(':collection_data', $collection_data);
           
            $insertQuery->execute();
       
            $response["status"] = 200;
            $response["message"] = "Data inserted";
          
        }catch(PDOException $e){
            $response["status"] = 404;
            $response["message"] = "Data not inserted";
        }
        echo json_encode($response);
        return $response;
        
    }

    function deleteProduct($data){
        $response = array();
         try{
             $stringId = implode(',',$data);
             $delQuery = $this->conn->prepare("DELETE FROM tbl_collection WHERE id IN ($stringId)");
             $delQuery->execute();
 
             $response["status"] = 200;
             $response["message"] = "data deleted";
          }catch(PDOException $e){
             $response["status"] = 404;
             $response["message"] = "data not delete";
         }
         echo json_encode($response);
         return $response;
     }


     
    function editData($data){
        //   echo "<pre>";
        //   print_r($data);
            $response = array();
            try {
        
                // $fetch_query = $this->conn->prepare("SELECT * FROM tbl_product");
                // $fetch_query->execute();
                // $product_result = $fetch_query->fetchAll(PDO::FETCH_ASSOC);
              
                //    echo "<pre>";
                //     print_r($product_result);
                    
                // if($data[0] != $product_result){
                    $query = $this->conn->prepare("UPDATE tbl_collection SET name=:name WHERE id=:id");
                    $query->bindParam(':id', $data['id']);
                    $query->bindParam(':name', $data['name']);
                    
                    $query->execute();
                    
                    
    
                    $response["status"] = 200;
                    $response["message"] = "update successfully";
                    
                      
    
                    //  }else{
                    //     $response["status"] = 400;
                    //     $response["message"] = null;
                    //  }
    
            } catch(PDOException $e) {
                $response["status"] = 404;
                $response["message"] = "Update failed: " . $e->getMessage();
            }
            echo json_encode($response);
        }
}


$frmData = json_decode(file_get_contents("php://input"), true);



if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "select") {

    $obj = new collectionController();
    $obj->select();
}

if (isset($_POST["action"]) && $_POST["action"] == "insertData") {
  
    $collection_data = array(
        "collection_name" => $_POST["collection_name"],
       
    );
  
    // Ensure you include the necessary class or function definition for productController
    $obj = new collectionController();
    $obj->insertData($collection_data);


}

if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "deleteProduct"){
    $obj = new collectionController();
    $obj->deleteProduct($frmData["data"]);
}


if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "updateRow"){
    // echo "<pre>";
    // print_r($frmData["data"]);
    // die;
    $obj = new collectionController();
    $obj->editData($frmData["data"]);
}