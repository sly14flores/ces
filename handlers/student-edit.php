<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$student = $con->getData("SELECT * FROM student_info WHERE id_number = $_POST[id_number]");

if ($student[0]['birthday'] != null) $student[0]['birthday'] = date("m/d/Y",strtotime($student[0]['birthday']));

echo json_encode($student[0]);

?>