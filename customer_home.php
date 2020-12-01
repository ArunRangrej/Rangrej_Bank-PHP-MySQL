
<?php
session_start();
include "connect.php";
include "session_timeout.php";
    if(isset($_SESSION['loggedIn_cust_id']))
    {
    $sql_nav = "SELECT * FROM customer WHERE cust_id=".$_SESSION['loggedIn_cust_id'];
    $result_nav = $conn->query($sql_nav);
    $row_nav = $result_nav->fetch_assoc();
    $id = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["debit"] == 0) {
        $transaction = $row1["credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["debit"];
        $type = "debit";
    }

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("d/m/Y, g:i A", $time);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_style.css">
     <link rel="stylesheet" href="css/user_navbar_style.css">
    <link rel="stylesheet" href="css/admin_home_style.css">
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
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
            <h1 id="customer">
                Welcome, <?php echo $row0["first_name"] ?>&nbsp<?php echo $row0["last_name"] ?>&nbsp!
                <br>AC/No: <?php echo $row0["account_no"]; ?>
            </h1>
            <p id="customer">
                &#9656 Balance (INR): <?php echo number_format($row1["balance"]); ?>/-
                <br>&#9656 Your last transaction (<?php echo $type; ?>) of&nbspRs.&nbsp<?php
                echo number_format($transaction); ?><br>
                on <?php echo $sanitized_time; ?>, was: "<?php echo $row1["remarks"]; ?>".
            </p>
        </div>
    </div>

</body>
</html>
<?php
}
else
     header("location:home.php");
?>
