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
    <div class="product-details-image" style="background-image: url('www/img/images/<?php echo $row['image'] ?>')" alt="<?php echo $row['name'] ?>"></div>
    <div id="product-details-info">
        <div class="top">
            <div class="title-card">
                <p class="title"><?php echo $row['name']?>&nbsp;</p>
                <p class="calories"><?php echo $row['calories'] ?>&nbsp;kcal</p>
            </div>
            <p class="price">$<?php echo $row['price'] ?></p>

            <p class="description"><?php echo $row['description'] ?></p>


            <a class="addToOrder-button" href="addcart.php?id=<?php echo $row['product_id'] ?>">Add To Order</a>
        </div>

        <div class="line"></div>

        <div class="bottom">
            <p class="ingredients">Ingredients</p>
            <p class="ingredients-list"><?php echo $row['ingredients'] ?></p>
        </div>
        <div class="edit-product">
            <a href="editproduct.php?id=<?php echo $row['product_id'] ?>">Edit Product</a>
            <a href="deleteproduct.php?id=<?php echo $row['product_id'] ?>">Delete Product</a>
        </div>



    </div>
</div>

<?php
require_once ('includes/footer.php');
