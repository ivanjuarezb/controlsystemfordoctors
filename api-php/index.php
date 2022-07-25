<?php
include 'controller\controller.php';

//Allow headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//Capture JSON
$json = $_POST['json'];
$params = json_decode($json);

//Use the controller
$controller = new Controller;
$response = $controller->postPatient($params);

//Send infomation
echo json_encode($response);
header('Content-Type_ application/json');

?>
