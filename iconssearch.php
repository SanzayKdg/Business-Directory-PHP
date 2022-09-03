<?php
    include 'partials/_dbconnect.php'; 
    $categories =$_GET['categories'];
    
    $sql = "SELECT * FROM `users` WHERE `business_category` = '$categories';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categories; ?></title>
    <link rel="stylesheet" href="css/businesslist.css">
</head>
<body>
    <?php include 'partials/_header.php';
     while($row = mysqli_fetch_assoc($result)){
        $businessTitle = $row['business_name'];
        $businessCat = $row['business_category'];
        $contact = $row['user_phone'];
        $address = $row['business_location'];
        $businessImage = $row['business_image'];
    
    echo    
    '<section id="businesslists-title">
    <div>
        <h1 class="business-heading">'.$categories.'</h1>
    </div>
</section>
    <section class="business-list">
    <div class="box-item">
    <a href="explorebusiness.php?id='.$row['user_id'].'"> <img src="partials/business image/'.$businessImage.'" width="350" height="200" class="store-img" alt="store image"></a>
    </div>
    <div class="business-name">
    <button disabled="disabled" class="business-title">'.$businessTitle.'</button>
    <div class="title">
    <h3 class="store-name"> <a href="explorebusiness.php?id='.$row['user_id'].' ">'.$businessTitle.'</a></h3>
    <p class="store-address">'.$address.'</p>
    <p class="store-address">'.$contact.'</p>
    </div>
    </section>
    ';
    
}



?>
</body>
</html>