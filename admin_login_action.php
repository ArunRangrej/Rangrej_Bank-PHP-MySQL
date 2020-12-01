<?php
    include "connect.php";
    if(!isset($_SESSION)) {
        session_start();
    $uname = $_POST["admin_uname"];
    $pwd = $_POST["admin_psw"];
      $result = $conn->query("SELECT * FROM admin WHERE uname = '$uname' limit 1");
    if($result->num_rows > 0)
    {   
        while($row = $result->fetch_assoc())
        {
            if($uname == $row['uname'] and $pwd == $row['pwd'])
            {       
               $_SESSION['admin'] = $uname;
               $_SESSION['LAST_ACTIVITY'] = time();    
                echo "1";                                   
            }
            else
            {
                echo "0";
            }
        }
    } 
    else
    {          
        echo "01";
    }
}

    else {
        session_destroy();
        die(header("location:home.php"));
    }
?>
