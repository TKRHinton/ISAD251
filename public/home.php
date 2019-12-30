<?php
include_once 'nav_bar.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <title>The Red Sea Bar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <!-- style for the application -->
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
        body {font-size:16px;}
        .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
        .w3-half img:hover{opacity:1}

    </style>
    <body>


    <!-- PAGE CONTENT -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="w3-container" style="margin-top:80px;" id="header">
            <h1 class="w3-jumbo"><b>Home Page</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>Welcome</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>


        <!-- Description -->
        <div class="w3-container" id="services" style="margin-top:30px">

            <p>Welcome to The Red Sea Bar, in this application you can order drinks and snacks using the navagation to the left</p>

            <p>Enjoy a drink in our spacious lounge bar, is a truly enjoyable experience – the views of the natural harbour, no ships just a variety of
                birds and may be even spot a stray seal or penguin and then across the water with the opposite side comprising of natural terrain,
                with the names of ships picked out by natural stones will help to ensure that you will have a “relaxing drink”</p>

            <p>    There is a full range of bar drinks including a wide selection of spirits, Whisky, Brandy and Liqueurs, soft drinks and  beer including and Devon only real ale.</p>
        </div>


        <!-- Showcase Title -->
        <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-xxxlarge w3-text-red"><b>Showcase</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <!-- Showcase of pictures showing the bar -->
        <div class="w3-row-padding">
            <div class="w3-half">
                <img src="../assests/img/bar1.jpg" style="width:90%" onclick="onClick(this)" alt="Picture of the bar">
                <img src="../assests/img/bar2.jpg" style="width:90%" onclick="onClick(this)" alt="One of the bartenders pouring a drink">

            </div>

            <div class="w3-half">
                <img src="../assests/img/bar3.jpg" style="width:90%" onclick="onClick(this)" alt="Picture of the design of the bar">
                <img src="../assests/img/bar4.jpg" style="width:90% " onclick="onClick(this)" alt="Bedroom and office in one space">
            </div>
        </div>


        <!-- End page padding-->
        <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>


    </div>

    </body>
    </html>
<?php
include_once 'footer.php';
?>