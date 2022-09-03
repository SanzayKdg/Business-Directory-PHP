<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Hub</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>
   
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>

    <section id="home">
        <h1 class="heading">Welcome to Business Hub</h1>
        <p class="description">Your personal business listing site!</p>
        <form action="_search.php" method="get">
        <div class="search">
        
            <input type="text" name = "searchName" id="business-name" placeholder="Business name">

            <input type="text" name = "searchLocation" id="business-loaction" placeholder="Location">
            <i id="location" class="fa-solid fa-location-dot falocation"></i>

            <button class="search-btn" type="submit">Search</button>
        </div>
        </form>
    </section>

    <section id="icons">
    <div class="font-icon">
                <div class="categories">
                    <a href="iconsearch.php?categories=Electronic Shop" class = "list-icons"><i class="fa-solid fa-laptop">
                            <p>Electronics</p>
                        </i>
                    </a>
                    <a href="iconsearch.php?categories=Fashion" class = "list-icons"> <i class="fa-solid fa-cart-shopping">
                            <p>Shopping</p>
                        </i>
                    </a>
                    <a href="iconsearch.php?categories=Restaurant" class = "list-icons"> <i class="fa-solid fa-utensils">
                            <p>Restaurants</p>
                        </i></a>
                    <a href="iconsearch.php?categories=Vehicles" class = "list-icons"><i class="fa-solid fa-car">
                            <p>Vehicles</p>
                        </i></a>
                    <a href="iconsearch.php?categories=Real Estate" class = "list-icons"><i class="fa-solid fa-house-chimney">
                            <p>Real Estate</p>
                        </i></a>
                </div>

            </div>
    </section>

    <section id="home-description">
        <div id="description-title">
            <h1 class="heading-left">Maximize your Business</h1>
            <div id="maximize-img">
                <img src="img/maximize1.png" id="maximg" alt="Maximize Your Business Image">
            </div>
            <p>Be visible! Obtain new customers and improve social media
                shares.Grow business reputation online.
                Your company profile can include contacts and description,
                products,
                photo gallery and your business location on the map.</p>
              
            <button class="list-btn"><a href="register.php"> List Your Buisness </a></button>
           
    </section>
    

    <section id="about-us">
        <h1>About Us</h1>
        <p> amet consectetur adipisicing elit. Quas expedita voluptatibus eveniet sed nostrum id
            assumenda, consequatur sit earum libero soluta, quasi officia eos.</p>
    </section>
    <?php include 'partials/_footer.php';?>
</body>

</html>