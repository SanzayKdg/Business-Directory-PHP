<?php include 'partials/_dbconnect.php'; ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/userdashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <style>
        small {
            display: none;
           margin-top: 1rem;
            color: #dc3545;
        }
        #required{
            display: block;
             margin: 1rem;
            color: black;
        }
        #mark{
            color: #dc3545;
            margin-right: 4px;
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <?php include 'partials/_userdashboard_sidebar.php'; ?>
    <?php $id = $_GET['userid']; ?>

    <?php
    if (isset($_SESSION['userLoggedin']) && $_SESSION['userLoggedin'] == true) {

        $sql = "SELECT * FROM `users` WHERE `user_id` = '$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['user_name'];
            $email = $row['user_email'];
            $contact = $row['user_phone'];
            $category = $row['business_category'];
            $desc = $row['business_description'];
            $businessTitle = $row['business_name'];
            $address = $row['business_location'];
            $businessImage = $row['business_image'];
        }



        echo '<section id="user-desc">
        <fieldset class="fieldset">
            <legend> USER PROFILE</legend>
            <div class="desc">
                <h3 class="storename">' . $businessTitle . '</h3>
                <p class="storeaddress">' . $address . '</p>
            </div>

            <div class="details">
                <p class="details-items"> <strong> Owner Name:</strong> &nbsp;' . $name . '</p>
                <p class="details-items"> <strong> E-mail:</strong> &nbsp;' . $email . '</p>
                <p class="details-items"> <strong> Contact:</strong> &nbsp;' . $contact . '</p>
                <p class="details-items"> <strong> Category:</strong> &nbsp;' . $category . '</p>
                <p class="details-items"> <strong> Description:</strong> &nbsp;' . $desc . '</p>
            </div>
        </fieldset>
    </section>';
        echo '<div class = "line-break"></div>
    <section id="change-info">
        <fieldset class="fieldset">
            <legend>Edit Profile</legend>
            <small id="required"><strong id = "mark">*</strong>Indicates required field</small>
        
            <form action="partials/_updateuserprofile.php?userid=<?php echo $id;?>" method="post" enctype="multipart/form-data" class = "edit">
                <div class="edit-group">
                    <input type="text" class="username edit-input" id="editname" name="editname" placeholder="Enter your full name *" required>
                <small id="errName">Name should contain letters only</small>
                    
                </div>

                <div class="edit-group">
                    <input type="email" class="email edit-input" id="editemail" name="editemail" placeholder="Enter email *" required>
                <small id="errEmail">Enter a valid email address</small>
                    
                </div>

                <div class="edit-group">
                    <input type="text" class="contact edit-input" id="editcontact" name="editcontact" placeholder="Contact no. *" required>
                <small id="errPhone">Contact no. should be 10 characters long.</small>
                    
                </div>

                <div class="edit-group">
                    <input type="text" class="business-name edit-input" id="editbusiness-name" name="editbusiness-name" placeholder="Business name *" required>
                </div>
                <div class="edit-group">
                    <input type="text" class="location edit-input" id="editlocation" name="editlocation" placeholder="Location *" required>
                </div>
                <div class="edit-group">
    
                    <input type="file" class="file edit-input" id = "editphoto" name="editphoto" accept="image/png, image/gif, image/jpeg" >
                </div>

                <div class="edit-group">
                    <input type="password" class="password edit-input" id="editpassword" name="editpassword" placeholder="Create password *" required>
                <small id="errPassword">Password should be greater than 8 characters long.</small>
                    
                </div>

                <div class="edit-group">
                    <input type="password" class="password edit-input" id="editrepassword" name="editrepassword" placeholder="Re-type password *" required>
                <small id="errRePassword">Password did not matched.</small>
                    
                </div>
                <div class="edit-group">
                    <textarea name="editdesc" id="editdesc" cols="30" rows="10"
                        placeholder="Enter business description...."></textarea>
                </div>
               
            <button class="edit-profile" type="submit" name="submit"> Edit Profile</button>
            </form>
        </fieldset>
    </section>';
    } ?>
     <script src="js/updateValidate.js"></script>
</body>

</html>