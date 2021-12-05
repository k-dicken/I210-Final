<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require ('includes/database.php');

$count = 0;

//retrieve cart content
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}
?>

<div id="showcart" class="full">
    <p class="p-title">Your Order (<?= $count ?>)</p>

    <?php
    if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
        echo "<p class='p-subtitle cart-item-name'>Your shopping bag is empty.</p>";
        echo "</div>";

        include ('includes/footer.php');
        exit();
    }

    //proceed since the cart is not empty
    $cart = $_SESSION['cart'];
    ?>

    <div class="cart">
<?php

        //select sql statement
        $sql = "SELECT * FROM products WHERE 0";
//
        foreach(array_keys($cart) as $product_id) {
            $sql .= " OR product_id=$product_id";
        }

        $query = $conn->query($sql);

        $cart_total = null;

        //fetch books and display them in a table
        while ($row = $query->fetch_assoc()) {

            $id = $row['product_id'];
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
            $qty = $cart[$product_id];
            $total = $qty * $price;
            $cart_total = $cart_total + $total;
            echo "<div class='cart-item'>",
            "<span style='background-image: url('www/img/images/", $image, "') class='cart-img'></span>",
            "<div class='cart-item-info'>",
            "<p class='p-subtitle cart-item-name'>$name</p>",
            "<p class='p-textLarge cart-item-price'>$$total</p>",
            "<p class='p-textLarge cart-item-quantity'>QTY $qty</p>",
            "</div>",
            "</div>";
        }

        ?>
<!--        <div class="cart-item">-->
<!--            <span class="cart-img"></span>-->
<!--            <div class="cart-item-info">-->
<!--                <p class="p-subtitle cart-item-name">Black Coffee</p>-->
<!--                <p class="p-textLarge cart-item-price">$2.99</p>-->
<!--                <p class="p-textLarge cart-item-quantity">QTY 1</p>-->
<!--            </div>-->
<!--        </div>-->

        <div class="line"></div>
        <div class="cart-total">
            <p class="p-subtitle bold">TOTAL</p>
            <p class="p-subtitle">$<?= $cart_total ?></p>
        </div>
        <a href="checkout.php" class="cart-order-button p-textLarge">PLACE ORDER</a>
    </div>

</div>

<?php
include ('includes/footer.php');
