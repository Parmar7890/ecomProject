<?php
session_start();
require("../database/db.php");
class Authcontroller{

    private $conn;

    public function __construct(){
        $obj = new Database();
        $this->conn = $obj->connection();
    }
    function insert_user($data) {
        // echo "<pre>";
        // print_r($data);
 $response = [];
 try {
    $email = $data[3]['value'];
    $phone = $data[2]['value'];
    $passwordHash = md5($data[4]['value']);

    $emailCheckStmt = $this->conn->prepare("SELECT id FROM tbl_user WHERE email=:email");
    $emailCheckStmt->bindParam(':email', $email);
    $emailCheckStmt->execute();
    $emailExists = $emailCheckStmt->fetchColumn();

    $phoneCheckStmt = $this->conn->prepare("SELECT id FROM tbl_user WHERE phone=:phone");
    $phoneCheckStmt->bindParam(':phone', $phone);
    $phoneCheckStmt->execute();
    $phoneExists = $phoneCheckStmt->fetchColumn();
    

    if ($emailExists) {
        $response["status"] = 400;
        $response["message"] = "This email is already registered";
    } elseif ($phoneExists) {
        $response["status"] = 400;
        $response["message"] = "This phone number is already registered";
    } else {
        $stmt = $this->conn->prepare("INSERT INTO tbl_user (full_name, phone, email, password) VALUES(:full_name, :phone, :email, :password)");
        $full_name = $data[0]['value'] . '-' . $data[1]['value'];
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->execute();
        $response["status"] = 200;
        $response["message"]  = "User registered successfully";
    }
} catch (PDOException $e) {
    $response["status"] = 400;
    $response["message"] = "User registration failed";
}

echo json_encode($response);
return $response;
    }

    function login_user($data){
        $response = array();
        $email = $data[0]['value'];
        $password = $data[1]['value'];
        $passwordHash = md5($password); // Note: MD5 is not secure, consider bcrypt
    
        // Prepare and execute SQL statement
        $statusCheckStmt = $this->conn->prepare("SELECT * FROM tbl_user WHERE email=:email AND password=:password");
        $statusCheckStmt->bindParam(':email', $email);
        $statusCheckStmt->bindParam(':password', $passwordHash);
        $statusCheckStmt->execute();
    
        // Fetch data
        $statusData = $statusCheckStmt->fetch(PDO::FETCH_ASSOC);
    
        // Check if data exists and if the password matches
        if ($statusData && $statusData['password'] === $passwordHash) {
            $_SESSION['id'] = $statusData['id'];
            if ($statusData["status"] == '1') {
                $response["status"] = 200;
                $response["message"] = "Login successful";
            } elseif ($statusData["status"] == '0') {
                $response["status"] = 202;
                $response["message"] = "User login successful";
            } else {
                $response["status"] = 400;
                $response["message"] = "Invalid email or password";
            }
        } else {
            // Provide more details for debugging
            $response["status"] = 400;
            $response["message"] = "Invalid email or password";
            $response["debug"] = "Email: $email, Password: $password";
        }
    
        echo json_encode($response);
        return $response;
    }
    
    
    function select(){
       
        $query = $this->conn->prepare("SELECT * FROM tbl_user");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    
    }
    
    function updateData($data) {
        // echo "<pre>";
        // echo "new";
        //  print_r($data);
        
        $response = [];
               try {
       
                   $sql = "UPDATE tbl_user SET full_name=:full_name,phone=:phone,email=:email,status=:status WHERE id=:id";
                  

                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':id',$data["id"]);
               $stmt->bindParam(':full_name', $data["full_name"]);
                   $stmt->bindParam(':phone', $data['phone']);
                   $stmt->bindParam(':email', $data['email']);
                 $stmt->bindParam(':status', $data['status']);
               $stmt->execute();
                      $response["status"] = 200;
                      $response["message"]  = "user update successfully";  
               
                  
               } catch (PDOException $e) {
                   // echo "Error: " . $e->getMessage();
              $response["status"] = 404;
         $response["message"] = "user not update";
               }
               echo json_encode($response);
               return $response;
                    
           }
       
       

function deleteData($data){
    
    $response = [];

    try{
        $idString = implode(",",$data);

        $sql = $this->conn->prepare("DELETE FROM tbl_user WHERE id IN ($idString)");
    
        $sql->execute();
        $response["status"] = 200;
        $response["message"] = "successfully deleted";
    }catch(PDOException $e){
        $response["status"] = 404;
        $response["message"] = "Record not delete";
    }
   echo json_encode($response);
    // print_r($response);
}
}






$frmData = json_decode(file_get_contents("php://input"), true);
// echo "<pre>";
// print_r($frmData);
// die;
if($frmData["action"] == "registernew")
{

    $user_registration = new Authcontroller();
    $result = $user_registration->insert_user($frmData['data']);
}

if($frmData["action"] == "loginnew")
{
// echo "<pre>";
// print_r($frmData);
// die;
    $user_login = new Authcontroller();
    $result = $user_login->login_user($frmData['data']);
}

if($frmData["action"] == "select"){
    $obj = new Authcontroller();
    echo $obj->select();
}


if($frmData["action"] == "updateRow"){
    // echo "<pre>";
    // var_dump($frmData);
    // die;
    $obj = new Authcontroller();
     $obj->updateData($frmData["data"]);
}

if($frmData["action"] == "deleteRow"){
    // echo "<pre>";
    // print_r($frmData);
    // echo "work";

    $obj = new Authcontroller();
    $obj->deleteData($frmData["data"]);
}


