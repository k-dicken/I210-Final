<?php
/** Author: Louie Zhu
 *  Date: 3/15/2012
 *  Description: This PHP script retrieves data from a form, and then
 *  inserts the data into the users table in the messageboard database.
 */

$page_title = "Create a new Product";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$category_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_NUMBER_INT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)));
$calories = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'calories', FILTER_SANITIZE_NUMBER_INT)));
$ingredients = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'ingredients', FILTER_SANITIZE_STRING)));

//define the MySQL insert statement
$sql = "INSERT INTO products VALUES (NULL, '$name', '$description', '$category_id','$price','$calories','$ingredients','$image')";

//execute the query
$query = @$conn->query($sql);

//handle error
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}
?>

<div id="full">

    <p class="p-title">Product was successfully created.</p>

</div>

<?php
$conn->close();

include 'includes/footer.php';

