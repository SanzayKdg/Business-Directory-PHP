<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Lists</title>
    <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/businesslist.css">
    <link rel="stylesheet" href="css/pagination.css">
</head>

<body>

    <?php include 'partials/_header.php';?>

    <section id="businesslists-title">
        <div>
            <h1 class="business-heading">Business Listings</h1>
        </div>
    </section>

    <section id="get_data" class="container">

    </section>


    <?php include 'partials/_footer.php';?>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
    function fetch_data(page) {
        $.ajax({
            url: "pagination.php",
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $("#get_data").html(data);
            }
        });
    }
    fetch_data();

    $(document).on("click", ".page-item", function() {
        var page = $(this).attr("id");
        fetch_data(page);
    })
    </script>
</body>

</html>