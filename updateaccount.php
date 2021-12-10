<?php
/**
 * Author: Jennifer Baldwin
 * Date: 12/9/2021
 * File: updateaccount.php
 * Description:
 */
$page_title = "Account Updated";

//include code from header.php and database.php
require_once 'includes/header.php';
require_once('includes/database.php');

//retrieve and sanatize data
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING)));
$address = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)));
$city = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)));
$state = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)));

$role = 2;  //regular user

//define the MySQL insert statement to update user's information
$sql = "UPDATE users SET
first_name = '$firstname', 
last_name = '$lastname',
username = '$username',
password = '$password',
user_email = '$email',
address = '$address',
city = '$city',
state = '$state',
role = '$role' WHERE user_id = $user_id";

//execute the query
$query = @$conn->query($sql);

//handle error
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

?>

    <div id="full page-display">
        <p class="p-title">Account was successfully updated.</p>
    </div>

<?php
$conn->close();

include 'includes/footer.php';

