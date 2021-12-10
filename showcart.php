<?php
$page_title = "Shopping Cart";
require_once('includes/header.php');
require('includes/database.php');

$count = 0;

//retrieve cart content
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}

echo "/";
?>

    <div id="showcart" class="full">
        <p class="p-title">Your Order (<?= $count ?>)</p>

        <?php
        if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
            echo "<p class='p-subtitle cart-item-name'>Your shopping bag is empty.</p>";
            echo "</div>";

            include('includes/footer.php');
            exit();
        }

        //proceed since the cart is not empty
        $cart = $_SESSION['cart'];
        ?>

        <div class="cart">
            <?php

            //select sql statement
            $sql = "SELECT * FROM products WHERE 0";

            //add each product to the sql statement
            foreach (array_keys($cart) as $id) {
                $sql .= " OR product_id=$id";
            }

            $query = $conn->query($sql);

            //cart global variable
            $cart_total = null;


            //fetch items and display them
            while ($row = $query->fetch_assoc()) {

                $product_id = $row['product_id'];
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $qty = $cart[$product_id];
                $total = $qty * $price;
                $cart_total = $cart_total + $total;
                echo "<a href='productdetails.php?id=$product_id' class='cart-item'>",
                "<div style='background-image: url(\"www/img/images/", $image, "\")' class='cart-img'></div>",
                "<div class='cart-item-info'>",
                "<p class='p-subtitle cart-item-name'>$name</p>",
                "<p class='p-textLarge cart-item-price'>$$total</p>",
                "<p class='p-textLarge cart-item-quantity'>QTY $qty</p>",
                "</div>",
                "</a>";
            }


            ?>

            <div class="line"></div>
            <div class="cart-total">
                <p class="p-subtitle bold">TOTAL</p>
                <p class="p-subtitle">$<?= $cart_total ?></p>
            </div>
            <a href="checkout.php" class="cart-order-button p-textLarge">PLACE ORDER</a>
        </div>

    </div>

<?php
include('includes/footer.php');
