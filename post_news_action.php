<?php
session_start();
include "connect.php";
include "session_timeout.php";
if(isset($_SESSION['admin']))
{
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/customer_add_style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/user_navbar_style.css">
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container-header">
        <div class="flex-item-header">
            <img src="images/logo.png" width="100" height="100">
        </div>
        <div class="flex-item-header">
            <h1>RANGREJ BANK</h1>
        </div>
    </div>
<div class="nav-wrapper">
        <div class="topnav" id="theTopNav">
            <a id="user">Welcome, ADMIN !</a>
            <a id="logout" href="logout_action.php" onclick="return confirm('Are you sure?')">Logout</a>
        </div>
        </div>

<div class="sidenav" id="theSideNav">
        <a href="admin_home.php">Home</a>
        <a id="label">My Customers</a>
        <a href="customer_add.php">Add Customer</a>
        <a href="manage_customers.php">Manage Customers</a>
        <a id="label">Website Management</a>
        <a href="post_news.php">Post News</a>
    </div>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            $headline = $_POST["headline"];
            $news_details = $_POST["news_details"];

            $sql0 = "INSERT INTO news (title, created)
            VALUES('$headline', NOW())";

            $sql1 = "INSERT INTO news_body (body)
            VALUES('$news_details')"; ?>

            <?php
            if (($conn->query($sql0) === TRUE) && ($conn->query($sql1) === TRUE)) { ?>
                <p id="info"><?php echo "News posted successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Server Error !<br>";
                echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>";
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php
            }

            $conn->close();
            ?>
        </div>

        <div class="flex-item">
            <a href="post_news.php" class="button">Post Again</a>
        </div>

    </div>

</body>
</html>
<?php
}
else
header("location:home.php");
?>
