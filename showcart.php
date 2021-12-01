<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>

<div id="showcart" class="">
    <p class="title">Your Cart</p>
    
    <div class="cart">
        <div class="cart-item">
            <img src="" alt="">
            <div class="cart-item-info">
                <p>Name</p>
                <p>QTY 1</p>
                <p>Price</p>
            </div>
        </div>
    </div>
</div>

<?php
include ('includes/footer.php');
