<?php
/**
 * Author: Adebayo Onifade
 * Date: 11/30/2021
 * File: searchproducts.php
 * Description:
 */
$page_title = "Search product";

include ('includes/header.php');
?>
    <h2>Search Products by Names</h2>
    <p>Enter one or more words in product's name.</p>
    <form action="searchproductresults.php" method="get">
        <input type="text" name="terms" size="40" required />&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search Product" />
    </form>
<?php
include ('includes/footer.php');