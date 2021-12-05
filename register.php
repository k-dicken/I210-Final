<?php
/**
 * Author: Adebayo Onifade
 * Date: 11/30/2021
 * File: register.php
 * Description:
 */

//include code from header.php and database.php
require_once('includes/database.php');

/*if(!filter_has_var(INPUT_POST, 'first_name') ||
    !filter_has_var(INPUT_POST, 'last_name') ||
    !filter_has_var(INPUT_POST, 'username') ||
    !filter_has_var(INPUT_POST, 'password') ||
    !filter_has_var(INPUT_POST, 'user_email') ||
    !filter_has_var(INPUT_POST, 'address') ||
    !filter_has_var(INPUT_POST, 'role')){
    $error = "The service is currently unavailable. Please try again later.";
    header("Location: error.php?m=$error");
    die();
}*/

$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING)));
$address = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)));

$role = 2;  //regular user

//insert statement. The id field is an auto field.
/*$sql = "INSERT INTO users VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role')";**/
$sql = "INSERT INTO users (first_name, last_name, username, password, user_email, address, role) VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$address', '$role')";


//execut the insert query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $error = "Insertion failed with: ($errno) $error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();

//start session if it has not already started

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//create session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = 2;

//set login status to 3 since this is a new user.

$_SESSION['login_status'] = 3;

//redirect the user to the userprofile.php page
header("Location: userprofile.php");
