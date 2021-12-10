<?php
$page_title = "Oishii - Profile";

require_once('includes/header.php');
require_once('includes/database.php');

//if user id cannot retrieved, terminate the script
if (is_null($user_id)) {
    echo "Error: User ID was not found";
    require_once('includes/footer.php');
    exit();

}

//MySQL SELECT statement
$sql = "SELECT * FROM users WHERE user_id = $user_id";

//execute the query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    $error = "Selection failed: ($errno) $errmsg<br/>";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}

if ($query->num_rows == 0) {
    $conn->close();
    require 'includes/footer.php';

    die("user not found.");
} else {
    $row = $query->fetch_assoc();
}


?>

<div class="full">
    <p class="p-title">Your Profile</p>

    <div id="profile-content">
        <div class="panel">
            <div class="profile-image"><img src='www/img/icons/profile_icon.svg' alt='profile'></div>

            <div class="summary">
                <p class="p-subtitle"><?= $name ?></p>
                <p class="p-textLarge">@<?= $login ?></p>
            </div>

            <div class="controls">
                <a class="edit-button p-textLarge" href='edituseraccount.php'>Edit Profile</a>
                <a class="logout-button p-textLarge" href='logout.php'>Logout</a>
                <a class="delete p-textSmall" href='deleteuser.php'>Delete Account</a>
            </div>
        </div>
        <div class="accInfo">
            <form action="register.php" method="post">
                <div class="name-wrapper">
                    <div class="input-wrapper">
                        <label for="first_name">First Name</label>
                        <div class="profile-display">
                            <p><?php echo $row['first_name'] ?></p>
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <label for="last_name">Last Name</label>
                        <div class="profile-display">
                            <p><?php echo $row['last_name'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <div class="profile-display">
                        <p><?php echo $row['username'] ?></p>
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="user_email">Email</label>
                    <div class="profile-display">
                        <p><?php echo $row['user_email'] ?></p>
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="address">Address</label>
                    <div class="profile-display">
                        <p><?php echo $row['address'] ?></p>
                    </div>
                </div>
                <div class="cityState-wrapper">
                    <div class="input-wrapper city">
                        <label for="city">City</label>
                        <div class="profile-display">
                            <p><?php echo $row['city'] . "," ?></p>
                        </div>
                    </div>
                    <div class="input-wrapper state">
                        <label for="state">ST</label>
                        <div class="profile-display">
                            <p><?php echo $row['state'] ?></p>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

<?php

require_once('includes/footer.php');

?>
