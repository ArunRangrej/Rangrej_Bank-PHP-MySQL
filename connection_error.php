<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="session_expired_style.css">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
            <img id="session" src="/Rangrej_Bank/images/error.png">
        </div>
        <div class="flex-item-message">
            <h1 id="session-sub">Uh-Oh !</h1>
            <p id="session-sub">
                We have error connecting to database !<br>
            </p>
            
        </div>
        <div class="flex-item">
            <a href="/Rangrej_Bank/home.php" class="button">Go Home</a>
        </div>
    </div>

</body>
</html>
