<?php
include 'connection\connect.php';
include 'model\patient.php';
include 'model\history.php';
include 'controller\controller.php';

//Allow headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//Capture JSON or variable 
if(isset($_POST['json']) && !empty($_POST['json'])){
    $json = $_POST['json'];
    $params = json_decode($json);
    $method = $params->method;
}elseif(isset($_GET['method']) && !empty($_GET['method'])){
    $method = $_GET['method'];
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $params = $_GET['id'];
    }elseif(isset($_GET['search']) && !empty($_GET['search'])){
        $params = $_GET['search'];
    }
}

//Use the controller and its correct method
$controller = new Controller;
if(isset($method) && $method == "createPatient"){
    $response = $controller->createPatient($params);
}elseif(isset($method) && $method == "updatePatient"){
    $response = $controller->updatePatient($params);
}elseif(isset($method) && $method == "getPatients" && !isset($params)){
   $response = $controller->getPatients();
}elseif(isset($method) && $method == "deletePatient" && isset($params) ){
    $response = $controller->deletePatient($params);
}elseif(isset($method) && $method == "getPatients" && isset($params) ){
    $response = $controller->getPatients($params);
}else{
    $response = [
        'code' => 400,
        'status' => 'error',
        'message' => 'Bad request'
    ];
}

//Send infomation
header('Content-type:application/json;charset=utf-8');
echo json_encode($response);
?>



