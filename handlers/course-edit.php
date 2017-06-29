<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$course_info = $con->getData("SELECT * FROM course_info WHERE id_number = $_POST[id_number]");

echo json_encode($course_info[0]);

?>