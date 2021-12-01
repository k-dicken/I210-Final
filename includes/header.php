<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count = 0;

//retrieve cart content
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}

//variables for a user’s login, name, and role
$login = '';
$name = '';
$role = 0;

//if the use has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND
    isset($_SESSION['role']))   {

    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}
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
        <div id="header-logo" class="logo"><a class="p-title" href="index.php">Oishii</a>

        </div>

        <!--clickable category links in the middle-->
        <nav class="nav-category-links">
            <button id="beveragesButton" class="p-textLarge" onclick="displayBeverages()" id="beveragesButton">Beverages
                <img src="www/img/icons/arrow-down.svg" alt=""></button>
            <button id="brunchButton" class="p-textLarge" onclick="displayBrunch()" id="brunchButton">Brunch <img
                        src="www/img/icons/arrow-down.svg" alt=""></button>
            <button id="bakeryButton" class="p-textLarge" mouseenter="displayBakery()" id="bakeryButton" href="">Bakery
                <img src="www/img/icons/arrow-down.svg" alt=""></button>
        </nav>

        <!--clickable icons on the left-->
        <nav class="nav-icon-links">
            <a href=""><img src="www/img/icons/search.svg" alt=""></a>
            <a href="addproduct.php"><img src="www/img/icons/plus.svg" alt=""></a>
            <a class="signin-button" style="color: white" href="userlogin.php">SIGN IN</a>
            <a href="showcart.php"><img src="www/img/icons/shopping-bag.svg" alt=""></a>
            <?php if ($count != 0) {echo "<div class='circle'></div>";} ?>
        </nav>

    </div>

    <!--the bottom part of the header-->
    <div id="side-header">
        <div id="side-header-display">Our new holiday drinks are here just in time for the winter season!</div>
    </div>

</div>
<div class="header-height"></div>




