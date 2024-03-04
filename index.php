<?php
require "conn.php";
$html = file_get_contents("kalkylark.html");
$replaceContent = "Updaterat!";
$html = str_replace("<!-- Replace -->", $replaceContent, $html);
echo $html;
?>

    <?php
    if (isset($_POST['selectedOption']) && isset($_POST['selectedOption2']) && isset($_POST['input-article'])) {
        $selectedValue = $_POST['selectedOption'];
        $selectedValue2 = $_POST['selectedOption2'];
        $inputNumber = $_POST['input-article'];
        //echo $selectedValue;
        //echo $selectedValue2;
        //echo $inputNumber;
        $query = "SELECT articleName, articleNumber FROM articles WHERE articleName = ? AND departmentName = ?";
        $query2 = "UPDATE articles SET articleNumber = articleNumber +? WHERE articleName = ? AND departmentName = ?";
        //Select query
        $stmt = $conn->prepare($query);
        //Updating query
        $stmt2 = $conn->prepare($query2);
        $stmt->bind_param("ss", $selectedValue, $selectedValue2);
        $stmt2->bind_param("iss", $inputNumber, $selectedValue, $selectedValue2);
        $stmt2->execute();
        $stmt->execute();
    
        //Hämta resultaten från queryn
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
        //    echo "Article Name: " . $row['articleName'] . " - Article Number: " . $row['articleNumber'] . "<br>";
        }
        
        $stmt2->close();
        $stmt->close();
    }
?>