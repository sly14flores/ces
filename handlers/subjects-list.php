<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$subjects = $con->getData("SELECT * FROM subject_info");

echo json_encode($subjects);

?>