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
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/user_navbar_style.css">
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
    <link rel="stylesheet" href="css/customer_add_style.css">
    <link rel="stylesheet" href="css/action_style.css">
</head>


<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$aadhar = $_POST["aadhar"];
$email = $_POST["email"];
$phno = $_POST["phno"];
$address = $_POST["address"];
$branch = $_POST["branch"];
$acno = $_POST["acno"];
$o_balance = $_POST["o_balance"];
$pin = $_POST["pin"];
$cus_uname = $_POST["cus_uname"];
$cus_pwd = $_POST["cus_pwd"];

$sql0 = "SELECT MAX(cust_id) FROM customer";
$result = $conn->query($sql0);
$row = $result->fetch_assoc();
$id = $row["MAX(cust_id)"] + 1;
$sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$id;
$conn->query($sql5);

$sql1 = "CREATE TABLE passbook".$id."(
            trans_id INT NOT NULL AUTO_INCREMENT,
            trans_date DATETIME,
            remarks VARCHAR(255),
            debit INT,
            credit INT,
            balance INT,
            PRIMARY KEY(trans_id)
        )";


$sql3 = "INSERT INTO customer VALUES(
            NULL,
            '$fname',
            '$lname',
            '$gender',
            '$dob',
            '$aadhar',
            '$email',
            '$phno',
            '$address',
            '$branch',
            '$acno',
            '$pin',
            '$cus_uname',
            '$cus_pwd'
        )";

$sql4 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
            'Opening Balance',
            '0',
            '$o_balance',
            '$o_balance'
        )";

?>

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
            if (($conn->query($sql3) === TRUE)) { ?>
                <p id="info"><?php echo "Customer created successfully !\n"; ?></p>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql1) === TRUE)) { ?>
                <p id="info"><?php echo "Passbook created successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql4) === TRUE)) { ?>
                <p id="info"><?php echo "Passbook updated successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql4 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } }?>
        </div>
        <div class="flex-item">
            <a href="customer_add.php" class="button">Add Again</a>
        </div>

    </div>

</body>
</html>
<?php
}
else
header("location:home.php");
?>
