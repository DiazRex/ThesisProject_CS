<?php 
require 'conn.php';
session_start(); // Add this line
if(isset($_POST["submit"])){

    $LUsername = $_POST['UserEmal'];
    $LPass = $_POST['PassWord'];
    
    $result = mysqli_query($conn, "SELECT * FROM thesisdata WHERE Username = '$LUsername' OR Email = '$LUsername'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($LPass == $row["PassW"]){
            $_SESSION["login"] = true;
            $_SESSION["ID"] = $row["ID"];

            if ($row["RoleSTI"] == "Student") {
              $username = $row["Username"];
              echo "<script>alert('Teacher and Admin only.'); </script>";
              echo "<script>window.location.href = 'Login.php';</script>";
              exit();
          } 
            if ($row["RoleSTI"] == "Teacher") {
              $username = $row["Username"];
                header("Location: content.php?username=$username");
            } else if ($row["RoleSTI"] == "Admin") {
                $username = $row["Username"];
                header("Location: Admin.php?username=$username");
            }

            echo "<script>alert('You are logged in.'); </script>";
        } else {
            echo "<script>alert('Wrong password.'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <style>
    body {
      background-color: #F8F9FA;
    }
    h1 {
      font-size: 48px;
      text-align: center;
      margin-top: 50px;
    }
    .container {
      max-width: 510px;
      margin-top: 215px;
    }
    form {
      -webkit-backdrop-filter: blur(1.5px);
        backdrop-filter: blur(1.5px);
        color: white;
        border: 0.5px solid white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 
      0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
    label {
      font-weight: bold;
    }
    input {
      margin-bottom: 10px;
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }
    
    .Guest {
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 20px;
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 
        0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        font-weight: bold;
    }

    a:visited {
  color: yellow;
}

/* mouse over link */
a:hover {
  color: green;
}


.button-29 {
  align-items: center;
  appearance: none;
  background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
  border: 0;
  border-radius: 6px;
  box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: "JetBrains Mono",monospace;
  height: 48px;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 18px;
}

.button-29:focus {
  box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
}

.button-29:hover {
  box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-29:active {
  box-shadow: #3c4fe0 0 3px 7px inset;
  transform: translateY(2px);
}
    
  </style>

</head>
  <body style="
  background-image:url(Pic/STIBCKG_1.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment:fixed;
  ">
  <div class="container">
      
        <form  action="" method="POST">
        <div class="form-group">
          <label>Username or Email</label>
          <input type="text" class="form-control" id="UserEmal" name="UserEmal" placeholder="✉️ Type your username or email" required>
        </div>
        
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control" id="PassWord" name="PassWord" placeholder="🔒 Type your password" required>
        </div>
        <input type="submit" name = "submit" id ="submit" class="button-29" value="Log-in" style="width: 100%;">
        <div class="links" style="Margin-top: 14px; text-align: center;">
            <label style="font-size: 20px;">Don't have an account? &nbsp<a href="Register.php">Create One</a> </label>
        </div>
      </form>

    </div>
    <!-- <div class="Guest">
        <a href="GuestCon.php" style="color: Black;">Guest</a>
    </div> -->
  </body>
</html>