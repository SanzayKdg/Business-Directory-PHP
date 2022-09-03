<?php include 'partials/_dbconnect.php';?>

<?php
    include 'partials/_dbconnect.php'; 
    $categories =$_GET['categories'];
    
    
    
    $limit = 9;
    $page = 0;
    $output = '';

    if(isset($_POST["page"])){
        $page = $_POST["page"];
    }else{
        $page = 1;
    }
    
    $start_from = ($page - 1)*$limit;
    $sql = "SELECT * FROM `users` WHERE `business_category` = '$categories';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

   
    while($row = mysqli_fetch_assoc($result)){
        $businessTitle = $row['business_name'];
        $businessCat = $row['business_category'];
        $contact = $row['user_phone'];
        $address = $row['business_location'];
        $businessImage = $row['business_image'];
        $output .= '<section id="businesslists-title">
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
    // pagination code 
    $sql2 = "SELECT * FROM `users`";
    $result2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($result2);
    $total_pages = ceil($total_record/$limit);
    $output .= '<ul class="pagination">' ;

    if($page > 1){
        $prev = $page - 1;
        $output .= '<li class="page-item" id = "1"><span class="page-link">First Page</span></li>';
        $output .= '<li class="page-item" id = "'.$prev.'"><span class="page-link"><i class="fa-solid fa-arrow-left"></i></span></li>';
    }
    
    for($i =1; $i<=$total_pages; $i++){
        $active_class = "";
        if($i == $page){
            $active_class = "active";
    
        }
        $output .=  '<li class="page-item '.$active_class.'" id = '.$i.'><span class="page-link">'.$i.'</span></li>';
    }
    if($page < $total_pages){
            $page++;
            $output .= '<li class="page-item" id='.$page.'><span class="page-link"><i class="fa-solid fa-arrow-right"></i></span></li>';
            $output .= '<li class="page-item" id='.$total_pages.'><span class="page-link">Last page</span></li>';
    }
    
    $output .= '</ul>' ;
    
    echo $output;
    ?>