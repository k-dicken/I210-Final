<?php
$page_title = "Edit Account";

require_once('includes/header.php');
require_once('includes/database.php');

//if user id cannot retrieved, terminate the script
if (is_null($user_id)) {
    echo "Error: User ID was not found";
    echo $user_id;
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

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';

    die("user not found.");

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

            <div style="height: 80px" class="controls">

            </div>
        </div>
        <div class="accInfo">
            <form action="updateaccount.php" method="post">
                <div class="name-wrapper">
                    <div class="input-wrapper">
                        <label for="first_name">First Name</label>
                        <input class="login-field" name="first_name" type="text" required value="<?php echo $row['first_name'] ?>">
                    </div>
                    <div class="input-wrapper">
                        <label for="last_name">Last Name</label>
                        <input class="login-field" name="last_name" type="text" required value="<?php echo $row['last_name'] ?>">
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="login-field" required value="<?php echo $row['username'] ?>">
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type='password' name='password' class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="user_email">Email</label>
                    <input class="login-field" name="user_email" type="email" required value="<?php echo $row['user_email'] ?>">
                </div>
                <div class="input-wrapper">
                    <label for="address">Address</label>
                    <input class="login-field" name="address" type="text" required value="<?php echo $row['address'] ?>">
                </div>
                <div class="cityState-wrapper">
                    <div class="input-wrapper city">
                        <label for="city">City</label>
                        <input class="login-field" name="city" type="text" required value="<?php echo $row['city']?>">
                    </div>
                    <div class="input-wrapper state">
                        <label for="state">ST</label>
                        <input class="login-field" name="state" type="text" required value="<?php echo $row['state'] ?>">
                    </div>
                </div>

                <input style="margin-top: 20px" id="submit" type="submit" value="Update Account"/>
                <a style="margin: 40px auto;" class="delete p-textSmall" href='deleteuser.php'>Delete Account</a>
            </form>

        </div>
    </div>

</div>

<?php

require_once('includes/footer.php');

?>
