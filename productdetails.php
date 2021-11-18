<?php
/** Author: your name
 *  Date: today's date
 *  Description:
 */
$page_title = "Product Details";
require_once ('includes/header.php');
require_once('includes/database.php');

//if product id cannot retrieved, terminate the script
if (!filter_has_var(INPUT_GET, "id")) {
    echo "Error: Product ID was not found";
    require_once('includes/footer.php');
    exit();

}
//retrieve product id from a query string variable.
$product_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM products WHERE product_id=$product_id";

//execute the query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    $error = "Selection failed: ($errno) $errmsg<br/>";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("Product not found.");
}

?>

<div id="product-details">
    <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
    <div id="product-details-info">
        <div class="top">
            <div class="title-card">
                <p class="title"><?php echo $row['name']?></p>
                <p class="calories"><?php echo $row['calories'] ?>&nbsp;kcal</p>
            </div>
            <p class="price">$<?php echo $row['price'] ?></p>

            <p class="description"><?php echo $row['description'] ?></p>


            <button class="addToOrder-button">Add To Order</button>
        </div>

        <div class="line"></div>
<<<<<<< HEAD
        <p class="ingredients">Ingredients</p>
        <p class="ingredients-list"><?php echo $row['ingredients'] ?></p>
        <br>
        <a href="editproduct.php?id=<?php echo $row['product_id'] ?>">Edit Product</a>
=======
            <div class="bottom">
                <p class="ingredients">Ingredients</p>
                <p class="ingredients-list"><?php echo $row['ingredients'] ?></p>
            </div>
>>>>>>> f857b114c81dc8f47e60c6985e1142eab452cdd8
    </div>
</div>

<?php
require_once ('includes/footer.php');
