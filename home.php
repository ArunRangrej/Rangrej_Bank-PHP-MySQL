<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/navbar_style.css">
    <link rel="stylesheet" href="css/home_style.css">
   <script type="text/javascript">
        function check()
        {
          var myid = document.getElementById("myid").value;
          var mypass = document.getElementById("mypass").value;
            var obj = new XMLHttpRequest();            
            obj.onreadystatechange = function() 
            {
            if(obj.readyState == 4 && obj.status == 200)
            {                   
              var response = obj.responseText;
              if(response == '1')
              {                  
                 window.location = "customer_home.php";   
               }
              if(response == '0')
              {                  
                alert("Entered Password is wrong..!");    
               }
              else if(response == '01')
              {
                alert("Customer Doesnot Exixt...! Wrong User Name..!");
              }
            }
          };
          obj.open("POST", "customer_login_action.php");
          obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          obj.send("myid="+myid+"&mypass="+mypass);
          }
    </script>
</head>

<body style="background: url(images/home.jpg) no-repeat center center fixed;">
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
            <div class="flex-item-1">
                <form>
                    <div class="flex-item-login">
                        <h2>Welcome Customer</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" id="myid" name="cust_uname" placeholder="Enter your Username" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" id="mypass" name="cust_psw" placeholder="Enter your Password" required>
                    </div>

                          <button type="button" onclick="check()">Login</button>
                    
                </form>
            </div>
        </div>

    </div>





</body>
</html>
