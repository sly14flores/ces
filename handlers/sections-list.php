<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

session_start();

$con = new pdo_db();

$sections = $con->getData("SELECT * FROM section_info");

echo json_encode($sections);

?>