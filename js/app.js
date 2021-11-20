let displayStrip = document.getElementById("side-header-display");

function displayBeverages() {
    displayStrip.innerHTML =
        "<a href=\"listproducts.php?category=1\">Coffee</a>" +
        "<a href=\"listproducts.php?category=2\">Teas</a>" +
        "<a href=\"listproducts.php?category=3\">Hot Chocolate</a>" +
        "<a href=\"listproducts.php?category=4\">Other</a>";
}
function displayBrunch() {
    displayStrip.innerHTML =
        "<a href=\"listproducts.php?category=5\">Breakfast</a>" +
        "<a href=\"listproducts.php?category=6\">Lunch</a>";
}

function displayBakery() {
    displayStrip.innerHTML =
        "<a href=\"listproducts.php?category=7\">Sweets</a>" +
        "<a href=\"listproducts.php?category=8\">Breads</a>";
}
