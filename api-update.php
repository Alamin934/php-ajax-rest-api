<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-headers: Access-Control-Allow-headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input") ,true);
$std_id = $data['s_id'];
$std_name = $data['s_name'];
$std_age = $data['s_age'];
$std_gender = $data['s_gender'];
$std_country = $data['s_country'];

include "config.php";

$sql = "UPDATE users SET p_name = '{$std_name}', p_age={$std_age}, p_gender='{$std_gender}', p_country='{$std_country}' WHERE p_id = {$std_id}";

if(mysqli_query($conn, $sql)){
    echo json_encode(['message'=>'Update Data Successfully', 'status'=>true]);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
