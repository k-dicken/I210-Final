<?php
/** Author: your name
 *  Date: today's date
 *  Description:
 */
$page_title = "Product Details";
require_once ('includes/header.php');

?>

    <form action="createproduct.php" method="get" enctype="text/plain" id="product-details" class="product-form">
        <img src="www/img/images/placeholderImage.jpg" alt="">
        <div id="product-details-info">
            <div class="top">
                <div style="flex-direction: column" class="title-card">
                    <input name="name" placeholder="Product Title" class="title section"><br>
                    <span class="calories section"><input name="calories" placeholder="kcal" type="number"> kcal</span>
                </div>
                <p class="price section">$<input name="price" placeholder="0.00" class="price" type="number" step="0.01"></p>

                <input name="category_id" placeholder="Product Category #" class="section" type="text">
                <textarea name="description" placeholder="Product Description" name="description" class="description section" cols="60" rows="6"></textarea>

            </div>

            <div class="line"></div>

            <div class="bottom">
                <p class="ingredients">Ingredients</p>
                <textarea name="ingredients" class="ingredients-list" placeholder="List of Ingredients" cols="30" rows="6"></textarea>
                <input name="image" placeholder="Image" class="section" type="text">
                <button class="submit-button p-textLarge">Submit</button>
            </div>
        </div>
    </form>

<?php
require_once ('includes/footer.php');
