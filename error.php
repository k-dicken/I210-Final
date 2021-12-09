<?php
/*
 * Author: Louie Zhu
 * Date: Jun 27, 2015
 * File: error.php
 * Description: This script displays an error message.
 *
 */

$page_title = "Oishii - Error";
require_once 'includes/header.php';

$error='Default error.';
if(isset($_GET['m'])) {
    $error = trim($_GET['m']);
}
?>
    <div class="full page-display">
        <h2 class="p-title">An error has occurred.</h2>
        <p class="p-textLarge"><?= $error ?></p>
    </div>


<?php
require_once 'includes/footer.php';
