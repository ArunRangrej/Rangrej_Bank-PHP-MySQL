<?php
    session_start();
    include "connect.php";
    include "session_timeout.php";
    if(isset($_SESSION['loggedIn_cust_id'])) 
    {
    $sql_nav = "SELECT * FROM customer WHERE cust_id=".$_SESSION['loggedIn_cust_id'];
    $result_nav = $conn->query($sql_nav);
    $row_nav = $result_nav->fetch_assoc();
    $sql0 = "SELECT * FROM passbook".$_SESSION['loggedIn_cust_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/user_navbar_style.css">
    <link rel="stylesheet" href="css/admin_home_style.css">
    <link rel="stylesheet" href="css/admin_sidebar_style.css">
    <link rel="stylesheet" href="css/transactions_style.css">
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

        <?php
            $result = $conn->query($sql0);
            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
                        <th>Trans. ID</th>
                        <th>Date & Time (IST)</th>
                        <th>Remarks</th>
                        <th>Debit (INR)</th>
                        <th>Credit (INR)</th>
                        <th>Balance (INR)</th>
                    </tr>
        <?php
            while($row = $result->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $row["trans_id"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($row["trans_date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                        <td><?php echo $row["remarks"]; ?></td>
                        <td><?php echo number_format($row["debit"]); ?></td>
                        <td><?php echo number_format($row["credit"]); ?></td>
                        <td><?php echo number_format($row["balance"]); ?></td>
                    </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            $conn->close(); ?>

    </div>
</body>
</html>
<?php
}
else
header("location:/Rangrej_Bank/home.php");
?>
