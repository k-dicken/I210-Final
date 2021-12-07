<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: userlogin.php");
    exit();
}


//empty the shopping cart
$_SESSION['cart'] = '';

//set page title
$page_title = "Oishii";
//display the header
require_once ('includes/header.php');
?>

    <h2>Order Confirmed</h2>

    <p>Thank you for shopping with us. Your business is greatly appreciated. You will be notified once your items are ready for pick-up.</p>

<?php
include ("includes/footer.php");