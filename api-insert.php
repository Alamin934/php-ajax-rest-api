<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-headers: Access-Control-Allow-headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input") ,true);
$std_id = $data['u_id'];
$std_name = $data['u_name'];
$std_age = $data['u_age'];
$std_city = $data['u_city'];

include "config.php";

$sql = "INSERT INTO users(p_name, p_age, p_gender, p_country) VALUES('{$std_name}',{$std_age},'{$std_gender}','{$std_country}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(['message'=>'Insert Data Successfully', 'status'=>true]);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
