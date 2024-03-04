<?php
header("text/plain");
$conn = new mysqli("p:localhost", "root", "Matteus@13", "case");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>