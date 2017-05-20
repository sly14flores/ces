<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$subject_info = $con->getData("SELECT * FROM subject_info WHERE id_number = $_POST[id_number]");

echo json_encode($subject_info[0]);

?>