<?php

date_default_timezone_set('Europe/London');

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <title>Pub Order Page</title>
</head>

<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
        <h3 class="w3-padding-64"><b>The Red Sea<br>Bar</b></h3>
    </div>
    <div class="w3-bar-block">
        <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="order.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Order</a>
        <a href="check_orders.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Check Orders</a>
        <a href="Add_Orders.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Add To Order</a>
        <a href="Cancel_Orders.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Cancel Order</a>
        <a href="admin_orders.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin Customer Orders</a>
        <a href="admin_stock.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin Drinks/Snacks</a>
        <a href="admin_Add.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin Add Item</a>
        <a href="admin_Edit.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin Edit Item</a>
        <a href="admin_Delete.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin Delete Item</a>
    </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
    <span>The Sea bar</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

</body>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
</script>
