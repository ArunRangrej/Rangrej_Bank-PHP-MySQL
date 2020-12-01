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
          var admin_uname = document.getElementById("admin_uname").value;
          var admin_psw = document.getElementById("admin_psw").value;
            var obj = new XMLHttpRequest();            
            obj.onreadystatechange = function() 
            {
            if(obj.readyState == 4 && obj.status == 200)
            {                   
              var response = obj.responseText;
              if(response == '1')
              {                  
                 window.location = "admin_home.php";   
               }
              if(response == '0')
              {                  
                alert("Entered Password is wrong..!");    
               }
              else if(response == '01')
              {
                alert("Admin Doesnot Exixt...! Wrong User Name..!");
              }
            }
          };
          obj.open("POST", "admin_login_action.php");
          obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          obj.send("admin_uname="+admin_uname+"&admin_psw="+admin_psw);
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
        <a href="#about">ABOUT US</a>

        <a href="home.php" style="float:right">GO BACK</a>
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
                        <h2>Welcome ADMIN</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" id="admin_uname" placeholder="Enter your Admin ID" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" id="admin_psw" placeholder="Enter your Password" required>
                    </div>

                          <button type="button" onclick="check()">Login</button>
                    
                </form>
            </div>
        </div>

    </div>





</body>
</html>
