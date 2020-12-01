<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/navbar_style.css">
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/news_style.css">
</head>

<body>
   <div class="flex-container-header">
        <div class="flex-item-header">
            <h1>RANGREJ BANK</h1>
        </div>
    </div>

    <div class="nav-wrapper">
    <div class="topnav" id="theTopNav">
        <a href="home.php">HOME</a>
        <a href="news.php">NEWS</a>
        <a href="contact.php">CONTACT</a>
        <a href="aboutus.php">ABOUT US</a>
        <a href="admin_login.php" style="float:right">ADMIN LOGIN</a>
    </div>
    </div>

    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Your Bank at Your Fingertips.</h1>
            </div>
        </div>

    <div class="flex-container">
        <?php
            $sql0 = "SELECT id, title, created FROM news ORDER BY created DESC";
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $sql1 = "SELECT body FROM news_body WHERE id=$id";
                $result1 = $conn->query($sql1); ?>

                <div class="flex-item">
                    <div class="flex-container-title">
                        <h1 id="title"><?php echo $row["title"] . "<br>"; ?></h1>
                    </div>
                    <div class="flex-container-title">
                        <p id="date"><?php echo "Date : " .
                            date("d/m/Y", strtotime($row["created"])); ?></p>
                    </div>
                    <div class="flex-container-body">
                        <p id="news_body"><?php while($row1 = $result1->fetch_assoc()) {
                            echo $row1["body"]; } ?></p>
                    </div>
                </div>

            <?php }
            } else {
                echo "No news available ! Please post some.";
            }
            $conn->close();
        ?>
    </div>

</body>
</html>
