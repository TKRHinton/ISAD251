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
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
        body {font-size:16px;}
        .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
        .w3-half img:hover{opacity:1}

    </style>



    <body>


    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->


        <div class="w3-container" style="margin-top:80px;" id="header">

            <h1 class="w3-jumbo"><b>Home Page</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>Welcome</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">


        </div>


        <!-- Description -->
        <div class="w3-container" id="services" style="margin-top:30px">

            <p>Welcome to The Sea Bar, in this application you can order drinks and snacks using the navagation to the left</p>

            <p>Enjoy a drink in our spacious lounge bar, is a truly enjoyable experience – the views of the natural harbour, no ships just a variety of
                birds and may be even spot a stray seal or penguin and then across the water with the opposite side comprising of natural terrain,
                with the names of ships picked out by natural stones will help to ensure that you will have a “relaxing drink”</p>

            <p>    There is a full range of bar drinks including a wide selection of spirits, Whisky, Brandy and Liqueurs, soft drinks and  beer including and Devon only real ale.</p>
        </div>

        <div class="w3-container" style="margin-top:80px" id="showcase">

        <h1 class="w3-xxxlarge w3-text-red"><b>Showcase</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <!-- Photo grid (modal) -->
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

        <!-- Modal for full size images on click-->
        <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
            <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
            <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                <img id="img01" class="w3-image">
                <p id="caption"></p>
            </div>
        </div>





        <!-- Packages / Pricing Tables -->
        <div class="w3-container" id="packages" style="margin-top:75px">
            <h1 class="w3-xxxlarge w3-text-red"><b>Packages.</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
            <p>Some text our prices. Lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half w3-margin-bottom">
                <ul class="w3-ul w3-light-grey w3-center">
                    <li class="w3-dark-grey w3-xlarge w3-padding-32">Basic</li>
                    <li class="w3-padding-16">Floorplanning</li>
                    <li class="w3-padding-16">10 hours support</li>
                    <li class="w3-padding-16">Photography</li>
                    <li class="w3-padding-16">20% furniture discount</li>
                    <li class="w3-padding-16">Good deals</li>
                    <li class="w3-padding-16">
                        <h2>$ 199</h2>
                        <span class="w3-opacity">per room</span>
                    </li>
                    <li class="w3-light-grey w3-padding-24">
                        <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
                    </li>
                </ul>
            </div>

            <div class="w3-half">
                <ul class="w3-ul w3-light-grey w3-center">
                    <li class="w3-red w3-xlarge w3-padding-32">Pro</li>
                    <li class="w3-padding-16">Floorplanning</li>
                    <li class="w3-padding-16">50 hours support</li>
                    <li class="w3-padding-16">Photography</li>
                    <li class="w3-padding-16">50% furniture discount</li>
                    <li class="w3-padding-16">GREAT deals</li>
                    <li class="w3-padding-16">
                        <h2>$ 249</h2>
                        <span class="w3-opacity">per room</span>
                    </li>
                    <li class="w3-light-grey w3-padding-24">
                        <button class="w3-button w3-red w3-padding-large w3-hover-black">Sign Up</button>
                    </li>
                </ul>
            </div>
        </div>



        <!-- End page content -->
    </div>

    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p></div>



    </body>
    </html>
<?php
include_once 'footer.php';
?>