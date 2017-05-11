<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db("student_info");

/*
** filters: date
*/

if (isset($_POST['student_info']['birthday'])) $_POST['student_info']['birthday'] = date("Y-m-d",strtotime($_POST['student_info']['birthday']));
	
/*
**
*/

if ($_POST['id_number']) { // > 0 - update
	$student = $con->updateData($_POST['student_info'],'id_number');
} else { // 0 - insert
	unset($_POST['student_info']['id_number']);
	$student = $con->insertData($_POST['student_info']);
}

?>