<?php
$servername = "localhost";
$username = "arun";
$password = "arun123";
$dbname = "rangrej_bank";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    header("location:connection_error.php");
    die($conn->connect_error);
}
?>
