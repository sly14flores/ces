<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db("course_info");

if ($_POST['course_info']['id_number']) { // > 0 - update
	$course = $con->updateData($_POST['course_info'],'id_number');
} else { // 0 - insert
	unset($_POST['course_info']['id_number']);
	$course = $con->insertData($_POST['course_info']);
	$id_number = $con->insertId;
}

?>