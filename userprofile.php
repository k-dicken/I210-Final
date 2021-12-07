<?php
$page_title = "Oishii - Profile";

require_once('includes/header.php');

?>

<div class="full">
    <p class="p-title">Your Profile</p>

    <div id="profile-content">
        <div class="profile-image"></div>
        <div>
            <p>@<?= $login ?></p>
            <p><?= $name ?></p>
            <a href='logout.php'>Log out</a>
        </div>
    </div>
</div>

<?php

require_once('includes/footer.php');

?>
