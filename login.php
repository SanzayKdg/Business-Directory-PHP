
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
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
    <?php include 'partials/_header.php';?>

    <section id = "login-title">
    <h1>Log In</h1>
    </section>
        
    <div>
    <h1 class = "login-heading">Log In</h1>
    </div>

    <section id = "login-form">
    <form action="partials/_handlelogin.php" name="myForm" onsubmit="return validate()" method="post">
    <div class="form-group">
                <input type="text" id ="email" class="user" name="email" placeholder="Username or email or phone" >
                <small id="errEmail">Enter a email.</small>
            </div>
    <div class="form-group">
                <input type="password" id="password" class="password" name="password" placeholder="Password">
                <small id="errPassword">Enter a Password.</small>

            </div>

            <div>
            <p class = "forgot-pw"><a href="#">Forgot Password?</a></p>
            <p class = "register-acc">Didn't have an account?<a href="register.php"> Register</a></p>
            </div>
            <button type = "submit" onsubmit="return validate()" class="log-in"> Log In </button>
    </form>
    </section>


    <?php include 'partials/_footer.php';?>
</body>
</html>