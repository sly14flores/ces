<?php

session_start();
if (!isset($_SESSION['id_number'])) header("location: login.html");

?>