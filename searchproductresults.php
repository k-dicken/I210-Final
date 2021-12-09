<?php
/**
 * Author: Adebayo Onifade
 * Date: 11/30/2021
 * File: searchproductresults.php
 * Description:
 */
$page_title = "Search product results";

require_once ('includes/header.php');
require_once('includes/database.php');

if (filter_has_var(INPUT_GET, "terms")) {
    $terms_str = filter_input(INPUT_GET, 'terms', FILTER_SANITIZE_STRING);
} else {
    echo "There was not search terms found.";
    include ('includes/footer.php');
    exit;
}

//explode the search terms into an array
$terms = explode(" ", $terms_str);

//select statement using pattern search. Multiple terms are concatenated in the loop.
$sql = "SELECT * FROM products WHERE 0";
foreach ($terms as $term) {
    $sql .= " OR name LIKE '%$term%'";
}

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    include ('includes/footer.php');
    exit;
}
?>
<!--    <table id="productlist" class="productlist">-->
<!--        <tr>-->
<!--            <th>Name</th>-->
<!--            <th class="col2">Category</th>-->
<!--            <th class="col3">Price</th>-->
<!--        </tr>-->

<!--        --><?php
//        //insert a row into the table for each row of data
//        while (($row = $query->fetch_assoc()) !== NULL) {
//            echo "<tr>";
//            echo "<td><a href='productdetails.php?id=", $row['product_id'], "'>", $row['name'], "</a></td>";
//            echo "<td>", $row['category_id'], "</td>";
//            echo "<td>", $row['price'], "</td>";
//            echo "</tr>";
//        }


//        ?>
<!--    </table>-->
    <div id="search-results" class="full">
<?php
    echo "<h2 class='p-title'>Showing \"$terms_str\"</h2>";
    echo "<a class='search-link p-textLarge' href='searchproducts.php'>Back to search</a><br><br><br>";

    //display results in a table
    if ($query->num_rows == 0) {
        echo "<p class='p-title'>Your search \"$terms_str\" did not match any products in our inventory</p>";

        include ('includes/footer.php');
        exit;
    }

    while ($row = $query->fetch_assoc()) {
        $product_id = $row['product_id'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        echo "<div class='cart-item'>",
        "<div style='background-image: url(\"www/img/images/", $image, "\")' class='cart-img'></div>",
        "<div class='cart-item-info'>",
        "<p class='p-subtitle cart-item-name'>$name</p>",
        "<p class='p-textLarge cart-item-price'>$$price</p>",
        "</div>",
        "</div>";
    }
?>
    </div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

include ('includes/footer.php');
