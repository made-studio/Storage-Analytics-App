<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="chart.js"></script>
    <link rel="stylesheet" href="case.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="index.html" class="logo"><i class='bx bxs-pear'></i>Äpple AB</a>
        <nav class="navbar">
            <a href="kalkylark.html">Kalkylark</a>
            <a href="analys.php">Analys</a>
        </nav>
        <a href="user.php">
            <div class="image-icon">
                <img src="istockphoto-1130884625-612x612.jpg" alt="profile-pic" class="user-image-icon">
            </div>
        </a>
    </header>
    <?php
require "conn.php";
session_start();
if($_SESSION['sharedVariable']!="Tim Kock"){
    echo "Ej tillgängligt för denna befattning.";
    exit;  
}

//Hämta produkter för Cupertino:
function selectCupertino($conn){
    $query = "SELECT articleName, articleNumber FROM articles WHERE departmentName = 'Cupertino'";
    $result = $conn->query($query);
    
    if ($result) {
        $php_data_array = array();
        while ($row = $result->fetch_assoc()) {
            $php_data_array[] = $row;
        }
        echo "<script>var my_2dC = " . json_encode($php_data_array) . ";</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

selectCupertino($conn);

//Hämta produkter för Norrköping:
function selectNorrköping($conn){
    $query = "SELECT articleName, articleNumber FROM articles WHERE departmentName = 'Norrköping'";
    $result = $conn->query($query);
    
    if ($result) {
        $php_data_array = array();
        while ($row = $result->fetch_assoc()) {
            $php_data_array[] = $row;
        }
        echo "<script>var my_2dN = " . json_encode($php_data_array) . ";</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

selectNorrköping($conn);

//Hämta produkter för Norrköping:
function selectFrankfurt($conn){
    $query = "SELECT articleName, articleNumber FROM articles WHERE departmentName = 'Frankfurt'";
    $result = $conn->query($query);
    
    if ($result) {
        $php_data_array = array();
        while ($row = $result->fetch_assoc()) {
            $php_data_array[] = $row;
        }
        echo "<script>var my_2dF = " . json_encode($php_data_array) . ";</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

selectFrankfurt($conn);


$queryDepartment = "SELECT departmentCountry, SUM(articleNumber) AS totalArticles FROM articles GROUP BY departmentCountry";
$resultDepartment = $conn->query($queryDepartment);

if($resultDepartment){
    $departments = array();
    while ($row = $resultDepartment->fetch_assoc()){
        $departments[] = $row;
    }
    echo "<script>var my_2dDep = " . json_encode($departments). ";</script>";
} else {
    echo "Error: " . $conn->error;
}


?>
<div class="visualizations">
<h1>Analys</h1>
<div id="regions_div"></div>
<div class="piecharts">
    <div class="piechart" id="piechart" alt="piechart top articles Cupertino"></div>
    <div class="piechart" id="piechartN" alt="piechart top articles Norrköping"></div>
    <div class="piechart" id="piechartF" alt="piechart top articles Frankfurt"></div>
</div>
</div>

</body>
</html>
