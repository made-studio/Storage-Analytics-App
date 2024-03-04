<?php
require "conn.php";

$query = "SELECT articleName, articleNumber FROM articles";
$result = $conn->query($query);

if ($result) {
    $php_data_array = array();
    while ($row = $result->fetch_assoc()) {
        $php_data_array[] = $row;
    }
    echo "<script>var my_2d = " . json_encode($php_data_array) . ";</script>";
} else {
    echo "Error: " . $conn->error;
}

?>