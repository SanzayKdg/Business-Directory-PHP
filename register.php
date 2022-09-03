<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <style>
        small {
            display: none;
            margin-left: 1.5rem;
            color: #dc3545;
        }
    </style>
   
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <section id="register-title">
        <h1>Register Your Business</h1>
    </section>

    <div>
        <h1 class="register-heading">Register</h1>
    </div>
    <section id="register-form">
        <form action="partials/_handlesignup.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="username" id="userName" name="name" placeholder="Enter your full name">
                <small id="errName">Name should contain letters only</small>
            </div>

            <div class="form-group">
                <input type="email" class="email" id="useremail" name="email" placeholder="Enter email">
                <small id="errEmail">Enter a valid email address</small>
            </div>

            <div class="form-group">
                <input type="text" class="contact" id="usercontact" name="contact" placeholder="Contact no.">
                <small id="errPhone">Contact no. should be 10 characters long.</small>

            </div>

            <div class="form-group">
                <input type="text" class="business-name" id="businessName" name="business-name" placeholder="Business name">
                
            </div>

            <select name="category" id="category">
                <option value="0">-- Select Category --</option>
                <option value="Electronic Shop">Electronic Shop</option>
                <option value="Fashion">Fashion</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Vehicles">Vehicles</option>
                <option value="Real Estate">Real Estate</option>
            </select>
          

            <div class="form-group">
                <input type="text" class="location" id="businessLocation" name="location" placeholder="Location">
            </div>

            <div class="form-group">
                <input type="password" class="password" id="userpassword" name="password" placeholder="Create password">
                <small id="errPassword">Password should be greater than 8 characters long.</small>
            </div>

            <div class="form-group">
                <input type="password" class="password" id="repassword" name="repassword" placeholder="Re-type password">
                <small id="errRePassword">Password didn't matched.</small>
            </div>

            <input type="file" name="photo" accept="image/png, image/gif, image/jpeg">

            <div class="container">
                <?php if (isset($_GET['error'])) : ?>
                    <p><?php echo "<span>" . $_GET['error'] . "</span>"; ?></p>
                <?php endif ?>
            </div>


            <div class="form-group">
                <textarea name="description" id="" cols="30" rows="10" placeholder="Enter business description...."></textarea>
            </div>

            </div>
            <button class="register-btn" type="submit" name="submit">Register</button>
        </form>
    </section>
    <?php include 'partials/_footer.php'; ?>
    <script src="js/registerValidate.js"></script>
    
</body>

</html>