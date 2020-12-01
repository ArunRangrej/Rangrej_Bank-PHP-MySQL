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
    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
            $aadhar = $row["aadhar_no"];
            $email = $row["email"];
            $phno = $row["phone_no"];
            $address = $row["address"];
            $branch = $row["branch"];
            $acno = $row["account_no"];
            $pin = $row["pin"];
            $cus_uname = $row["uname"];
            $cus_pwd = $row["pwd"];
        }
    }

    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            $balance = $row["balance"];
        }
    }
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

    <form class="add_customer_form" action="customer_profile_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Your account details . . .</h1>
        </div>



        <div class="flex-container">
            <div class=container>
                <label>First Name : <label id="info_label"><?php echo $fname ?></label></label>
            </div>
            <div class=container>
                <label>Last Name : <label id="info_label"><?php echo $lname ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No : <label id="info_label"><?php echo $acno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance (INR) : <label id="info_label"><?php echo number_format($balance) ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Gender :
                    <label id="info_label">
                    <?php
                        if ($gender == "male") {echo "Male";}
                        elseif ($gender == "female") {echo "Female";}
                        else {echo "Others";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Date of Birth : <label id="info_label"><?php echo $dob ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Aadhar No : <label id="info_label"><?php echo $aadhar ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Phone No. : <label id="info_label"><?php echo $phno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Address :</label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Bank Branch :
                    <label id="info_label">
                        <?php
                            if ($branch == "delhi") {echo "Delhi";}
                            elseif ($branch == "mumbai") {echo "Mumbai";}
                            elseif ($branch == "bengaluru") {echo "Bengaluru";}
                            elseif ($branch == "chennai") {echo "chennai";}
                        ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="/customer_home.php" class="button">Home</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
        </div>

    </form>

</body>
</html>
<?php
}
else
header("location:home.php");
?>