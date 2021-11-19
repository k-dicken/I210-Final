<?php
/** Author: Louie Zhu
 *  Date: 10/30/2014
 *  Description: This PHP script retrieves a user id from a url querystring.
 *  It then retrieves details of the specified user from the users table in the databate.
 *  At the end, it displays user details in a HTML table.
 */

$page_title = "Edit Products details";

require_once('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: product id was not found.";
    require_once('includes/footer.php');
    exit();
}
$product_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM products WHERE product_id = $product_id";

//run the SQL statement
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once('includes/footer.php');
    exit;
}

//read a record
$row = $query->fetch_assoc();

//display results in a table
?>

<form action="updateproduct.php" method="get" enctype="text/plain" id="product-details" class="product-form">
    <img src="www/img/images/placeholderImage.jpg" alt="">
    <div id="product-details-info">
        <input name="product_id" type="text" value="<?php echo $row['product_id'] ?>" hidden>
        <div class="top">
            <div style="flex-direction: column">
                <input name="name" placeholder="Product Title" class="title section" value="<?php echo $row['name'] ?>"><br>
                <span class="calories section"><input name="calories" placeholder="kcal" type="number" value="<?php echo $row['calories'] ?>"> kcal</span>
            </div>
            <p class="price section">$<input name="price" placeholder="0.00" class="price" type="number" step="0.01" value="<?php echo $row['price'] ?>"></p>

            <input name="category_id" placeholder="Product Category #" class="section" type="text" value="<?php echo $row['category_id'] ?>">
            <textarea name="description" placeholder="Product Description" name="description" class="description section" cols="60" rows="6"><?php echo $row['description'] ?></textarea>
<<<<<<< HEAD
=======

<!--            <button style="background-color: grey" class="addToOrder-button" disabled>Add To Order</button>-->
>>>>>>> 7ce23e3a0a9f2875c8265d54500f511aaefde9ff
        </div>

        <div class="line"></div>

        <div class="bottom">
            <p class="ingredients">Ingredients</p>
            <textarea name="ingredients" class="ingredients-list" placeholder="List of Ingredients" cols="30" rows="6"><?php echo $row['ingredients'] ?></textarea>
            <input name="image" placeholder="Image" class="section" type="text" value="<?php echo $row['image'] ?>">
            <button class="submit-button p-textLarge">Submit</button>
        </div>
    </div>
</form>

<?php
$conn->close();

include 'includes/footer.php';
