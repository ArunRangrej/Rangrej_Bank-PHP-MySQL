<?php
session_start();
include "connect.php";
include "session_timeout.php";
if(isset($_SESSION['admin']))
{
   if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id'];
    $sql1 = "SELECT * FROM passbook".$_SESSION['cust_id']." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$_SESSION['cust_id'].")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
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

    <form class="add_customer_form" action="edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Edit/View Customer details . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Customer ID : <label id="info_label"> <?php echo $_SESSION['cust_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
                <input name="fname" size="30" type="text" value="<?php echo $fname ?>" required />
            </div>
            <div  class=container>
                <label>Last Name :</b></label><br>
                <input name="lname" size="30" type="text" value="<?php echo $lname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance (INR) : <label id="info_label"> <?php echo number_format($balance) ?> </label></label>
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
                <label>Date of Birth :</label><br>
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Aadhar No :</label><br>
                <input name="aadhar" size="25" type="number" value="<?php echo $aadhar ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div  class=container>
                <label>Phone No. :</b></label><br>
                <input name="phno" size="30" type="number" value="<?php echo $phno ?>" required />
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
                <label>Bank Branch :</label>
            </div>
            <div  class=container>
                <select name="branch">
                    <option value="delhi" <?php if ($branch == 'delhi') {?> selected="selected" <?php }?>>Delhi</option>
                    <option value="bengaluru" <?php if ($branch == 'bengaluru') {?> selected="selected" <?php }?>>Bengaluru</option>
                    <option value="mumbai" <?php if ($branch == 'mumbai') {?> selected="selected" <?php }?>>Mumbai</option>
                    <option value="chennai" <?php if ($branch == 'chennai') {?> selected="selected" <?php }?>>Chennai</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No :</label><br>
                <input name="acno" size="25" type="number" value="<?php echo $acno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>PIN(4 digit) :</b></label><br>
                <input name="pin" size="15" type="number" value="<?php echo $pin ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="text" value="<?php echo $cus_pwd ?>" required />
            </div>
        </div>
        

        <div class="flex-container">
            <div class="container">
                <button type="submit">Update</button>
                <a href="manage_customers.php" class="button">Go Back</a>
            </div>
            
        

    </form>

</body>
</html>
<?php
}
else
header("location:home.php");
?>
