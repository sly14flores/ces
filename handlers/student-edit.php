<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$student_info = $con->getData("SELECT * FROM student_info WHERE id_number = $_POST[id_number]");
$academic_info = $con->getData("SELECT * FROM academic_info WHERE student_info = $_POST[id_number]");
$parental_info = $con->getData("SELECT * FROM parental_info WHERE student_info = $_POST[id_number]");

if ($student_info[0]['birthday'] != null) $student_info[0]['birthday'] = date("m/d/Y",strtotime($student_info[0]['birthday']));

$student = array("student_info"=>$student_info[0],"academic_info"=>$academic_info[0],"parental_info"=>$parental_info[0]);

echo json_encode($student);

?>