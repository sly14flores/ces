<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$section_info = $con->getData("SELECT * FROM section_info WHERE id_number = $_POST[id_number]");

echo json_encode($section_info[0]);

?>