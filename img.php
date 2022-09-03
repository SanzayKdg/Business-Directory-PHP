<?php
    if(isset($_POST['submit']) && isset($_FILES['photo'])){
        include '_dbconnect.php';

// file upload
echo "<pre>";
print_r($_FILES['photo']);
echo "</pre>";

// $img_name = $_FILES['photo']['name'];
// $img_size = $_FILES['photo']['size'];
// $tmp_name = $_FILES['photo']['tmp_name'];
// $error = $_FILES['photo']['error'];

// if($error === 0 ){
//     if($img_size > 125000){
//         $em = "Sorry, your file is too large.";
// 		    header("Location: index.php?error=$em");
      

//     }else{
//        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//         $img_ex_lc = strtolower($img_ex);
        
//         $allowed_exs = array("jpg", "jpeg", "png");
    
//         if(in_array($img_ex_lc,  $allowed_exs)){
//             $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
//             $path_img_upload = 'uploads/'.$new_img_name;
//             move_uploaded_file($tmp_name,$path_img_upload);
       
//         }else{
//             $em = "You can't upload files of this type";
// 		        header("Location: index.php?error=$em");

//         }
    
//     }
// }else{
//     $em = "unknown error occurred!";
//     header("Location: index.php?error=$em");
// }
    }
//     else {
//         header("Location: index.php");
// }
?>