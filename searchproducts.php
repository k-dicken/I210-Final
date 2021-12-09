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
    <div class="search-page full page-display">
        <h2 class="p-title">Search our Products</h2>
        <p class="p-textLarge">Enter one or more keywords.</p>
        <form action="searchproductresults.php" method="get">
            <input style="margin-top: 40px; padding: 10px" class="p-textSmall" placeholder="Search..." type="text" name="terms" size="40" required />&nbsp<br>
            <input style="margin-top: 20px" class="p-textSmall button" type="submit" name="Submit" id="Submit" value="Search Product" />
        </form>
    </div>
<?php
include ('includes/footer.php');