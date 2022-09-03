<?php
   include "partials/_dbconnect.php"
?>
<?php session_start(); 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    



    if(isset($_GET['delete']) && isset($_GET['userid'])){
        $dId = $_GET['delete'];
        $sql3 = "DELETE FROM `users` WHERE `user_id` = $dId";
        $reslut3 = mysqli_query($conn, $sql3);
    }
echo '<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
   <link rel="stylesheet" href="css/admindashboard.css">
   <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
<section id="sidebar">';

        $id = $_GET['userid'];
        $sql = "SELECT * FROM `admin` WHERE `admin_id` = '$id'";
        $result = mysqli_query($conn, $sql);

           while( $row = mysqli_fetch_assoc($result)){
            $loginId = $row['admin_id'];
            $loginName = $row['admin_name'];
            $loginContact = $row['admin_contact'];
            $loginEmail = $row['admin_email'];
            $adminImage = $row['admin_image'];
        }
       
        echo '
        <div>
            <img src="partials/admin image/'.$adminImage.'" alt="store-image" class="store-img" height="150" width="175">
           
            <div class="hrline"></div>
        </div>
</section>

<section id="admin-desc">
                <div class="details">
                <p class="details-items"> <i class="fa-solid fa-user-gear admin"></i> <strong> Admin Name:</strong></p>
                <p class="details-items">'.$loginName.'</p>
                <p class="details-items"> <i class="fa-solid fa-envelope admin"></i> <strong> E-mail:</strong></p>
                <p class="details-items">'.$loginEmail.'</p>
                <p class="details-items"> <i class="fa-solid fa-phone admin"></i> <strong> Contact:</strong></p>
                <p class="details-items">'.$loginContact.'</p>
            </div>
            
            <div class="icons">
            <ul>
      
                <li class="list-icons"><a href="partials/_contactus.php?userid='.$id.'"><i class="fa-solid fa-message"></i>Message</a></li>
                <li class="list-icons"><a href="partials/_adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>SIGN OUT</a></li>
            </ul>
                <!-- <a href="" class = "list-icons"><i class="fa-solid fa-laptop">
                 <p>Electronics</p>--!>
            </i>
    </a>
        </div>
    </section>
    

    <section id="change-info">
        <fieldset class="fieldset">
            <legend>Edit Profile</legend>
            <small id="required"><strong id = "mark">*</strong>Indicates required field</small>

            <form action="partials/_updateadminprofile.php?userid='.$id.'" method="post" class = "edit" enctype="multipart/form-data">
                <div class="edit-group">
                    <input type="text" id="editname" class="username edit-input" name="editname" placeholder="Enter name *">
                    <small id="errName">Name should contain letters only</small>
                
                    </div>

                <div class="edit-group">
                    <input type="email" id="editemail" class="password edit-input" name="editemail" placeholder="Enter email *">
                    <small id="errEmail">Enter a valid email address</small>
               
                    </div>

                <div class="edit-group">
                    <input type="text"  id="editcontact" class="contact edit-input" name="editcontact" placeholder="Contact no. *">
                    <small id="errPhone">Contact no. should be 10 characters long.</small>
                
                    </div>

                <div class="edit-group">
                    <input type="password" id="editpassword"  class="password edit-input" name="editpassword" placeholder="Create password *">
                    <small id="errPassword">Password should be greater than 8 characters long.</small>
               
                    </div>

                <div class="edit-group">
                    <input type="password" id="editrepassword"  class="password edit-input" name="editrepassword" placeholder="Re-type password *">
                    <small id="errRePassword">Password did not matched.</small>
                
                    </div>
                <div class="edit-group">
    
                    <input type="file" class="file edit-input" name="editphoto" accept="image/png, image/gif, image/jpeg" >
                </div>
                
               
            <button class="edit-profile" type="submit" name="submit"> Edit Profile</button>
            </form>
        </fieldset>
    </section>
 <div class = "line-break"></div>

 <section id="business-list">
      <table  id="myTable">
       <thead >
      <tr id="table-head">
         <th class="thead">S.no</th>
         <th class="thead">User Name</th>
         <th class="thead">User Contact</th>
         <th class="thead">User Email</th>
         <th class="thead">Business Name</th>
         <th class="thead">Business Location</th>
         <th class="thead">Registered Date</th>
         <th class="thead action">Action</th>
      </tr>
      </thead>
      <tbody>';
    
   
        $sql2 = "SELECT * FROM `users` ORDER BY `user_id` DESC";
        $result2 = mysqli_query($conn, $sql2);
        $sno =0;
        while($row = mysqli_fetch_assoc($result2)){
            $sno++;
            $userId = $row['user_id'];
            $name = $row['user_name'];
            $email = $row['user_email'];
            $contact = $row['user_phone'];
            $businessTitle = $row['business_name'];
            $address = $row['business_location'];
            $regDate = $row['date'];
    
            $convertDate = strtotime($regDate);
            $newDate = date('Y-m-d', $convertDate);
      echo '<tr id="table-body">
         <td class="tbody">'.$sno.'</td>
         <td class="tbody">'.$name.'</td>
         <td class="tbody">'.$contact.'</td>
         <td class="tbody">'.$email.'</td>
         <td class="tbody">'.$businessTitle.'</td>
         <td class="tbody">'.$address.'</td>
         <td class="tbody">'.$newDate.'</td>
         <td class="tbody actionbtn">';
        
         if(isset($_GET['verify'])){
            $approved = 1;
            $vID = $_GET['verify'];
            
            $sql = "UPDATE `users` SET `approvedStatus` ='$approved' WHERE `user_id` = '$vID'";
            $result = mysqli_query($conn, $sql);

            
        }

        
       
    echo' <button id = "d'.$userId.'" class="btn verify ">Verify</button>
        <button id = "d'.$userId.'" class="btn delete">Delete</button>
         </td>
      </tr>';

    }     
      echo'</tbody>
      </table>
    </section>

 <script>
    $(document).ready( function () {
        $("#myTable").DataTable({
            "searching" : false,
            "paging" : true,
        "pagelength" : 10});
        });
    </script>
    <script>
    
        verify = document.getElementsByClassName("verify");
        Array.from(verify).forEach((element)=>{
            element.addEventListener("click", (e)=>{
               let sno = e.target.id.substr(1);

               if(confirm("Do you want to verify this business list?")){
                window.location = `admindashboard.php?userid='.$id.'&verify=${sno}`
                alert("One business list was verified successfully");
                
            }else{
                alert("Business list was not verified");
            }
            });
        });
        deletes = document.getElementsByClassName("delete");
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click", (e)=>{
               let sno = e.target.id.substr(1);

               if(confirm("Do you really want to delete this business list?")){
                window.location = `admindashboard.php?userid='.$id.'&delete=${sno}`
                alert("One business list was deleted successfully");

            }else{
                alert("Business list was not deleted");
            }
            });
        });


    </script>
    <script src="js/adminupdatevalidation.js"></script>
    
</body>
</html>';
    }
    else{
        $em = "Invalid Id or Password";
        header("Location: /BDMS/adminlogin.php?$em");
    }
?>
