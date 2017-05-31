<?php

session_start();

if (isset($_SESSION['id_number'])) unset($_SESSION['id_number']);

echo "Logout Successful";

header("location: ../index.php");

?>