<?php
    if(!isset($_SESSION['loggedIn_cust_id'])) {
        session_start();
    include "connect.php";
    include "session_timeout.php";
    $sql_nav = "SELECT * FROM customer WHERE cust_id=".$_SESSION['loggedIn_cust_id'];
    $result_nav = $conn->query($sql_nav);
    $row_nav = $result_nav->fetch_assoc();
    $email = $_POST["email"];
    $address = $_POST["address"];
    $cus_uname = $_POST["cus_uname"];

    $sql0 = "UPDATE customer SET email = '$email',
                                 address = '$address',
                                 uname = '$cus_uname'
                            WHERE cust_id=".$_SESSION['loggedIn_cust_id'];;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/header_style.css">
     <link rel="stylesheet" href="css/user_navbar_style.css">   
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
    <link rel="stylesheet" href="css/customer_add_style.css">
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
            <a id="user">Welcome, &nbsp<?php echo $row_nav["first_name"]; ?> !</a>
            <a id="logout" href="logout_action.php" onclick="return confirm('Are you sure?')">Logout</a>
            <a id="profile" href="customer_profile.php">My Profile</a>
        </div>
        </div>

        <div class="sidenav" id="theSideNav">
        <a href="customer_home.php">Home</a>
        <a href="customer_transactions.php">My Transactions</a>
    </div>
    <div class="flex-container">
        <div class="flex-item">
            <?php
                if (($conn->query($sql0) === TRUE)) { ?>
                    <p id="info"><?php echo "Values Updated Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="customer_home.php" class="button">Home</a>
        </div>

    </div>

</body>
</html>
<?php
}
else
header("location:home.php");
?>
