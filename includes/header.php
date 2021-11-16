<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css">
</head>
<body>
<!--the entire header-->
<div id="header">

    <!--the top part of the header-->
    <div id="main-header">
        <!--logo-->
        <a class="logo" id="header-logo" href="index.php">Oishii</a>

        <!--clickable category links in the middle-->
        <nav class="nav-category-links">
<<<<<<< Updated upstream
            <button onclick="displayBakery()" id="bakeryButton" href="">Bakery <img src="www/img/icons/arrow-down.svg" alt=""></button>
            <button onclick="displayBeverages()" id="beveragesButton">Beverages <img src="www/img/icons/arrow-down.svg" alt=""></button>
            <button onclick="displayBrunch()" id="brunchButton">Brunch <img src="www/img/icons/arrow-down.svg" alt=""></button>
=======
            <button id="beveragesButton" class="p-textLarge" onclick="displayBeverages()">Beverages <img src="www/img/icons/arrow-down.svg" alt=""></button>
            <a class="p-textLarge"  href="listproducts.php?category=5">Breakfast</a>
            <a class="p-textLarge" href="listproducts.php?category=6">Lunch</a>
            <button id="bakeryButton" class="p-textLarge" onclick="displayBakery()">Bakery <img src="www/img/icons/arrow-down.svg" alt=""></button>
>>>>>>> Stashed changes
        </nav>

        <!--clickable icons on the left-->
        <nav class="nav-icon-links">
            <a href=""><img src="www/img/icons/search.svg" alt=""></a>
            <a class="signin-button" style="color: white" href="">SIGN IN</a>
            <a class="signin-button" style="color: white" href="userlogin.php">SIGN IN</a>
            <a href=""><img src="www/img/icons/shopping-bag.svg" alt=""></a>
        </nav>

    </div>

    <!--the bottom part of the header-->
    <div id="side-header">
        <div id="side-header-display">Our new holiday drinks are here just in time for the winter season!</div>
    </div>

</div>
<div class="header-height"></div>




