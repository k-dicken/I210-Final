<?php

/** Author: Louie Zhu
 *  Date: 10/30/2015
 *  Description: This PHP script retrieves user id from a query string variable.
 *  It then deletes a record from the users table in the database.
 */

$page_title = "Delete a Product";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: Product id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$product_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the MySQL delete statement
$sql = "DELETE FROM products WHERE product_id=$product_id";

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>

    <div id="full">

        <p class="p-title">Product was successfully deleted.</p>

    </div>

<?php
// close the connection.
$conn->close();

include ('includes/footer.php');
