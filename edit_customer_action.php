<?php
session_start();
include "connect.php";
include "session_timeout.php";
if(isset($_SESSION['admin']))
{
    if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $aadhar = $_POST["aadhar"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $address = $_POST["address"];
    $branch = $_POST["branch"];
    $acno = $_POST["acno"];
    $pin = $_POST["pin"];
    $cus_uname = $_POST["cus_uname"];
    $cus_pwd = $_POST["cus_pwd"];

    $sql0 = "UPDATE customer SET first_name = '$fname',
                                 last_name = '$lname',
                                 dob = '$dob',
                                 aadhar_no = '$aadhar',
                                 email = '$email',
                                 phone_no = '$phno',
                                 address = '$address',
                                 branch = '$branch',
                                 account_no = '$acno',
                                 pin = '$pin',
                                 uname = '$cus_uname',
                                 pwd = '$cus_pwd'
                            WHERE cust_id=".$_SESSION['cust_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/user_navbar_style.css">
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
    <link rel="stylesheet" href="css/action_style.css">
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
                if (($conn->query($sql0) === TRUE)) { ?>
                    <p id="info"><?php echo "Values Updated Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>

        <div class="flex-item">
            <a href="manage_customers.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
<?php
}
else
    header("location:home.php");
?>