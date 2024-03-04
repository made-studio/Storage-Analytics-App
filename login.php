<?php
    require "conn.php";

    if(isset($_POST['uname']) && isset($_POST['password'])){

        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM logins WHERE username = '$uname' AND password = '$password'";
        session_start();
        $_SESSION['sharedVariable'] = $uname;
        if($uname="Tim Kock"){
            $_SESSION['sharedInfo'] = "Befattning: Chef <br><br> Chefen har till gång till alla funktioner:<br> -Analys och visualiseringar<br> -Ändring av lagerstatus <br>-Exportering till excel.";
        }
        if($uname="Maja Majason"){
            $_SESSION['sharedInfo'] = "Befattning: Operativ Chef <br><br> Den operativa chefen har till två funktioner: <br> -Ändring av lagerstatus <br>-Exportering till excel.";
        }
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)){
            echo "Hello";
            header("Location: index.html");
        exit();
        }else{
            echo "Denied Access";
        }
        
    }else{
        header("Location: index.php?");
        exit();
    }

?>