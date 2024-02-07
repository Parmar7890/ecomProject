<?php  
require('../database/db.php');

class productController{
    private $conn;

    public function __construct(){
        $obj = new Database();
        $this->conn = $obj->connection();
    }

    function select(){
        $query = $this->conn->prepare("SELECT * FROM tbl_product");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($result);
        // die;
       echo  json_encode($result);
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
                $query = $this->conn->prepare("UPDATE tbl_product SET name=:name, brand=:brand, price=:price, slug=:slug, tag=:tag, image=:image WHERE id=:id");
                $query->bindParam(':id', $data['id']);
                $query->bindParam(':name', $data['name']);
                $query->bindParam(':brand', $data['brand']);
                $query->bindParam(':price', $data['price']);
                $query->bindParam(':slug', $data['slug']);
                $query->bindParam(':tag', $data['tag']);
                $query->bindParam(':image', $data['image']);
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

    function insertData($data){
        echo "<pre>";
        print_r($data);
        $response = array();
        try{
            // echo "<pre>";
            $product_name = $data['product_name'];
            $brand = $data['brand'];
            $price = $data['price'];
            $slug = $data['slug'];
            $tag = $data['tag'];
            $image_name = $data['image_name'];
            $image_temp = $data['image_temp'];
            $image_path = "./uploads/" . basename($image_name); 
            
            move_uploaded_file($image_temp, $image_path); 
            
            $insertQuery = $this->conn->prepare("INSERT INTO tbl_product (name, brand, price, slug, tag, image) VALUES (:product_name, :brand, :price, :slug, :tag, :image)");
            $insertQuery->bindParam(':product_name', $product_name);
            $insertQuery->bindParam(':brand', $brand);
            $insertQuery->bindParam(':price', $price);
            $insertQuery->bindParam(':slug', $slug);
            $insertQuery->bindParam(':tag', $tag);
            $insertQuery->bindParam(':image', $image_path); 
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
            $delQuery = $this->conn->prepare("DELETE FROM tbl_product WHERE id IN ($stringId)");
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
    
}

$frmData = json_decode(file_get_contents("php://input"), true);
// echo "<pre>";
// print_r($frmData);
// die;

if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "select") {

    $obj = new productController();
    $obj->select();
}

if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "updateRow"){
    // echo "<pre>";
    // print_r($frmData["data"]);
    // die;
    $obj = new productController();
    $obj->editData($frmData["data"]);
}

if(isset($frmData) && isset($frmData["action"]) && $frmData["action"] == "deleteProduct"){
    $obj = new productController();
    $obj->deleteProduct($frmData["data"]);
}

if (isset($_POST["action"]) && $_POST["action"] == "insertData") {
    $product_data = array(
        "product_name" => $_POST["product_name"],
        "brand" => $_POST["brand"],
        "price" => $_POST["price"],
        "slug" => $_POST["slug"],
        "tag" => $_POST["tag"],
        "image_name" => $_FILES["image"]["name"],
        "image_temp" => $_FILES["image"]["tmp_name"]
    );

    // Ensure you include the necessary class or function definition for productController
    $obj = new productController();
    $obj->insertData($product_data);


}



