<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$student = $con->getData("SELECT id_number, firstname, lastname, contact_no FROM student_info WHERE id_number = $_POST[id_number]");

echo json_encode($student[0]);

?>