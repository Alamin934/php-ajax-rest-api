<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];
// $search_value = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";

$sql = "SELECT * FROM users WHERE user_name LIKE '%{$search_value}%' OR user_city LIKE '%{$search_value}%'";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

if(mysqli_num_rows($query) > 0){
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(['message'=>'Data Not Found', 'status'=>false]);
}
