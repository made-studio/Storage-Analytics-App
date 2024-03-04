<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="case.css">
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
    <div class="user-card">
        <div class="image">
            <img src="istockphoto-1130884625-612x612.jpg" alt="profile-pic" class="user-image">
        </div>
        <div class="text-data">
            <span class="name"><b>
            <?php
            session_start();
            echo $_SESSION['sharedVariable'];
            ?>
            </b></span>
            <span class="name"><b></b></span>
            <span class="info"><?php session_start();
             echo $_SESSION['sharedInfo'];?></span>
             <button><a href="login.html">Logga ut</a></button>
        </div>
    </div>
</body>
</html>