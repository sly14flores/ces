<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db("student_info");

/*
** filters: date
*/

if (isset($_POST['birthday'])) $_POST['birthday'] = date("Y-m-d",strtotime($_POST['birthday']));
	
/*
**
*/

if ($_POST['id_number']) { // > 0 - update
	$student = $con->updateData($_POST,'id_number');
} else { // 0 - insert
	unset($_POST['id_number']);
	$student = $con->insertData($_POST);
}

?>