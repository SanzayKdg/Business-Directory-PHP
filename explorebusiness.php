<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/explorebusiness.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">

</head>

<body>
    <?php include 'partials/_dbconnect.php'?>

    <?php include 'partials/_header.php' ?>
    <?php

       $id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE `user_id` = $id" ;
        $result = mysqli_query($conn, $sql);
      
       
        while($row= mysqli_fetch_assoc($result)){
       
            // fetching contents from database
             
                $businessTitle = $row['business_name'];
                $contact = $row['user_phone'];
                $address = $row['business_location'];
                $businessImage = $row['business_image'];
                $category = $row['business_category'];
                $desc = $row['business_description'];
       }
      



    echo '<section class="business-title">
        <div>
            <h1> '.$businessTitle.' </h1>
            <p> '.$address.' </p>
        </div>
    </section>

    <div class="category">
        <button disabled="disabled" class="business-category">Category > '.$category.'</button>
    </div>

    <section id="business-description">
    
        <div class="desc">
            <div class= "business-img">
            <img src="partials/business image/'.$businessImage.'" alt="store-image" class="store-img" height="200" width="200">
            </div>
            <div class="hrline">
            </div>
            <div class = "descriptions">
                <p class="title">'.$businessTitle.'</p>
                <p class="address">Address: &nbsp;'.$address.'</p>
                <p class="contact">Contact: &nbsp;'.$contact.'</p>
                <p class="description">Description:'.$desc.'</p>
            </div>
        </div>
    </section>';?>


<?php    
// Map display
    $sql2 = "SELECT * FROM `map` WHERE `user_id` = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    while($rows = mysqli_fetch_assoc($result2)){
        $mapId = $rows['map_id'];
        $getLatitude = $rows['latitude'];
        $getLongitude = $rows['longitude'];
        
}
    ?> 
<section id="store-location">
            <div class="location">
            <p> Store Location </p>
            <div class="map">
            <iframe src="https://www.google.com/maps?q=<?php echo $getLatitude; ?>,<?php echo $getLongitude; ?>&hl=es;z=14&output=embed" width="550" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

  <section id="footer">
  <?php include 'partials/_footer.php'?>
  </section>
</body>

</html>