<?php
$dbhost     = "localhost";
$dbuser     = "root";
$dbpass     = "";
$dbname     = "project";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
?>