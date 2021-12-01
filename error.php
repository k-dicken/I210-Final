<?php
/*
 * Author: Louie Zhu
 * Date: Jun 27, 2015
 * File: error.php
 * Description: This script displays an error message.
 *
 */

$page_title = "PHP Online Bookstore Error";
require_once 'includes/header.php';

$error='Default error.';
if(isset($_GET['m'])) {
    $error = trim($_GET['m']);
}
?>
    <br>
<h3>An error has occurred.</h3>
    <?= $error ?>
    <br>

<?php
require_once 'includes/footer.php';
