<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

/*
** filters: date
*/

if (isset($_POST['student_info']['birthday'])) $_POST['student_info']['birthday'] = date("Y-m-d",strtotime($_POST['student_info']['birthday']));
	
/*
**
*/

$con = new pdo_db("student_info");
if ($_POST['student_info']['id_number']) { // > 0 - update
	$student = $con->updateData($_POST['student_info'],'id_number');
} else { // 0 - insert
	unset($_POST['student_info']['id_number']);
	$student = $con->insertData($_POST['student_info']);
	$id_number = $con->insertId;
}

$con->table = "academic_info";
if ($_POST['academic_info']['id_number']) { // update
	$academic_info = $con->updateData($_POST['academic_info'],'id_number');
} else { // save
	unset($_POST['academic_info']['id_number']);
	$_POST['academic_info']['student_info'] = $id_number;
	$academic_info = $con->insertData($_POST['academic_info']);		
}

$con->table = "parental_info";
if ($_POST['parental_info']['id_number']) { // update
	$parental_info = $con->updateData($_POST['parental_info'],'id_number');
} else { // save
	unset($_POST['parental_info']['id_number']);
	$_POST['parental_info']['student_info'] = $id_number;
	$parental_info = $con->insertData($_POST['parental_info']);		
}

?>