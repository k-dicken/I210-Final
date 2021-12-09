<?php
/**
 * Author: Adebayo Onifade
 * Date: 11/30/2021
 * File: logout.php
 * Description:
 */
//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset all the session variables
$_SESSION = array();

//delete the session cookie
setcookie(session_name(), "", time() - 3600);

//destroy the session
session_destroy();

$page_title = "Oishii Logout";
include ('includes/header.php');

?>
    <div class="full page-display">
        <h2 class="p-title">You have been logged out.</h2>
        <p class="p-textLarge">Thank you for visiting Oishii. See you next time!</p>
    </div>

<?php
include ('includes/footer.php');