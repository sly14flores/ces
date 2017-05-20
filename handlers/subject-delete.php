<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db("subject_info");

$delete = $con->deleteData(array("id_number"=>implode(",",$_POST['id_number'])));	

?>