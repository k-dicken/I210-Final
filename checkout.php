<?php
//check session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: userlogin.php");
    exit();
}

//empty the shopping cart
$_SESSION['cart'] = [];

//set page title
$page_title = "Oishii";

//display the header
require_once ('includes/header.php');
?>

    <div class="full page-display">
        <h2 class="p-title">Order Confirmed</h2>
        <br>
        <p class="p-textLarge">Thank you for shopping with us. Your business is greatly appreciated. <br> You will be notified once your items are ready for pick-up.</p>
    </div>


<?php
include ("includes/footer.php");