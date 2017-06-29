<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db("section_info");

if ($_POST['section_info']['id_number']) { // > 0 - update
	$student = $con->updateData($_POST['section_info'],'id_number');
} else { // 0 - insert
	unset($_POST['section_info']['id_number']);
	$student = $con->insertData($_POST['section_info']);
	$id_number = $con->insertId;
}

?>