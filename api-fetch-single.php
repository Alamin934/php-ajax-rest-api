<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"), true);
$std_id = $data['sid'];

include "config.php";

$sql = "SELECT * FROM users WHERE p_id = {$std_id}";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

if(mysqli_num_rows($query) > 0){
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(['message'=>'No Record Found', 'status'=>false]);
}
