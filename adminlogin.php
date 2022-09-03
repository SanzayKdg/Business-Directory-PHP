<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/adminlogin.css">
    <script src="js/_login.js"></script>
    <style>
        small{
            display: none;
            /* display: block; */
            margin-left: 1.5rem;
         color: #dc3545;
        }
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <section id="sidebar">
        <div>
            <img src="img/admin.png" alt="store-image" class="store-img" height="150" width="175">
           
            <div class="hrline"></div>
        </div>
</section>
    <div>
    <h1 class = "login-heading">Log In</h1>
    </div>

    <section id = "login-form">
    <form action="partials/_handleadminlogin.php" name="myForm" onsubmit="return validate()" method="post">
    <div class="form-group">
                <input type="text" class="user" name="email" placeholder="Username or email or phone">
                <small id="errEmail">Enter a email.</small>
            </div>
    <div class="form-group">
                <input type="password" class="password" name="password" placeholder="Password">
                <small id="errPassword">Enter a Password.</small>
            </div>

            <div>
            <p class = "forgot-pw"><a href="#">Forgot Password?</a></p>
            </div>
            <button type = "submit" class="log-in"> Log In </button>
    </form>
    </section>
</body>
</html>