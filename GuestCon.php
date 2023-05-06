<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Game</title>

  
<style>
    
    .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .circle {
    display: inline-block;
    position: relative;
    width: 450px;
    height: 450px;
}

.circle-border {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    text-align: center;
    line-height: 450px; /* match the height of the circle */
    border: 5px solid transparent;
    border-image: linear-gradient(to right, #6BB2D1, #3BDE5E, #0DFBFB) 1;
    animation: rotateBorder 3s linear infinite;
}

.circle-border2 {
    position: absolute;
    margin: 20px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    text-align: center;
    line-height: 450px; /* match the height of the circle */
    border: 5px solid transparent;
    border-image: linear-gradient(to right, #6BB2D1, #3BDE5E, #0DFBFB) 1;
    animation: rotateBorder2 5s linear infinite;
}

@keyframes rotateBorder {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes rotateBorder2 {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.circle a {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
    

    .circle h1 {
        display: inline-block; /* to center the text */
        margin: 0; /* remove any default margin */
    }

    .logout {
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 20px;
        background-color: white;
        padding: 10px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 
        0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        font-weight: bold;
        height: 30px;
        display: flex;
    justify-content: center;
    align-items: center;
    }

    .logout h3{
        color: Black;
        text-decoration: none;
    }

    .Notif {
    position: absolute;
    top: 5px;
    right: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: white;
    padding: 5px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 
    0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    font-weight: bold;
    
  }
  
  .Notif h3 {
    margin: 0;
  }
  
  .Notif h3 a {
    display: block;
    color: Black;
    text-align: center;
    font-size: 20px;
    margin-top: 50%;
    transform: translateY(-50%);
    text-decoration: none;
  }


</style>


</head>
<html>
<body style="background-image:url(Pic/BCKG.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment:fixed;
  ">
    
<div class="container-fluid">
    <div class="row">

        <div class="col-12"> 
        <div class="circle">
        <div class="circle-border"></div>
        <div class="circle-border2"></div>
        <h1><a href="#" style="text-decoration:none; text-align: center; color: white;">Play Game!
    <br>as <br>Guest</a></h1>
            </div>
        

    </div>
    <div class="logout">
       <h3><a href="login.php" style="color:black; text-decoration:none;">Back to Login</a></h3>
    </div>

    <div class="Notif">
    
        <h3><a href="#">?</a></h3>
    </div>

</div>

</body>
</html>