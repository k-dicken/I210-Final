<?php
$pageTitle = "Oishii - Login";

require_once('includes/header.php');

$login_status = null;
if (isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
}

//the user's last login attempt succeeded
if ($login_status == 1) {
    echo "<p>You are logged in as " . $_SESSION['login'] . ".</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include('includes/footer.php');
    exit();
}

//the user has just registered
if ($login_status == 3) {
    echo "<p>Hooray!!! Welcome on board, your account has been created.</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include('includes/footer.php');
    exit();
}

//the user's last login attempt failed
if ($login_status == 2) {
    $message = "Username or password invalid. Please try again.";
}

?>

<div id="login">

    <p class="p-title">Sign in</p>

    <form action="userverifyaccount.php" method="post">
        <div class="input-wrapper">
            <label for="username">Username</label>
            <input name="username" type="text" class="login-field" required>
        </div>

        <div class="input-wrapper">
            <label for="password">Password</label>
            <input name="password" type="password" class="login-field" required>
        </div>

        <input type="submit" name="Submit" id="submit" value="Login"/>
    </form>

    <p class="p-textLarge">Don't have an account? <a href="usercreateaccount.php">Create One!</a></p>

</div>

<?php

require_once('includes/footer.php');

?>
