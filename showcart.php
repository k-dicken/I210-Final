<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>

<div id="showcart" class="full">
    <p class="p-title">Your Order (1)</p>
    
    <div class="cart">
        <div class="cart-item">
            <span class="cart-img"></span>
            <div class="cart-item-info">
                <p class="p-subtitle cart-item-name">Black Coffee</p>
                <p class="p-textLarge cart-item-price">$2.99</p>
                <p class="p-textLarge cart-item-quantity">QTY 1</p>
            </div>
        </div>
        <div class="cart-item">
            <span class="cart-img"></span>
            <div class="cart-item-info">
                <p class="p-subtitle cart-item-name">Black Coffee</p>
                <p class="p-textLarge cart-item-price">$2.99</p>
                <p class="p-textLarge cart-item-quantity">QTY 1</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="cart-total">
            <p class="p-subtitle bold">TOTAL</p>
            <p class="p-subtitle">Amount</p>
        </div>
        <a href="checkout.php" class="cart-order-button p-textLarge">PLACE ORDER</a>
    </div>

</div>

<?php
include ('includes/footer.php');
