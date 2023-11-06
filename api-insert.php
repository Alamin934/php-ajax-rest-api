<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-headers: Access-Control-Allow-headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input") ,true);

$std_name = $data['sname'];
$std_age = $data['sage'];
$std_city = $data['scity'];

include "config.php";

$sql = "INSERT INTO users(user_name, user_age, user_city) VALUES('{$std_name}',{$std_age},'{$std_city}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(['message'=>'Insert Data Successfully', 'status'=>true]);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
