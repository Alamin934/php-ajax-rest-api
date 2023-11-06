<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-headers: Access-Control-Allow-headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input") ,true);
$std_id = $data['sid'];
$std_name = $data['sname'];
$std_age = $data['sage'];
$std_city = $data['scity'];

include "config.php";

$sql = "UPDATE users SET user_name = '{$std_name}', user_age={$std_age}, user_age='{$std_age}', user_city='{$std_city}' WHERE user_id = {$std_id}";

if(mysqli_query($conn, $sql)){
    echo json_encode(['message'=>'Update Data Successfully', 'status'=>true]);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
