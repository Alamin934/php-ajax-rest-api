<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-headers: Access-Control-Allow-headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);
$std_id = $data['d_id'];

include "config.php";

$sql = "DELETE FROM users WHERE user_id = {$std_id}";

if(mysqli_query($conn, $sql)){
    echo json_encode(['message'=>'Record Deleted Successfully', 'status'=>true]);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
