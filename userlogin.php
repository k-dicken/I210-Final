<?php

$page_title = "Oishii - Login";
require_once('includes/header.php');

?>

<?php
$message = "Please enter your username and password to login.";
//check the login status
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
    <!-- working login page design-->
        <div id="login">
            <p class="p-title">Sign in</p>

            <form action="userverifyaccount.php" method="post">
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type='password' name='password' class="login-field" required>
                </div>
                <input id="submit" type="submit" name="Submit"  value="Login"/>
            </form>
            <p class="p-textLarge">Don't have an account? <a href="usercreateaccount.php">Create One!</a></p>
        </div>


    <!--working login-->

<!--    <div class="login-container">-->
<!--        display the login form -->
<!--        <div class="login">-->
<!--            <form method='post' action='userverifyaccount.php'>-->
<!--                <table>-->
<!--                    <tr>-->
<!--                        <td colspan="2">--><?php //echo $message; ?><!--</br><br></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td style="width: 80px">User name:</td>-->
<!--                        <td><input type='text' name='username' required></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Password:</td>-->
<!--                        <td><input type='password' name='password' required></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td colspan='2' style='padding: 10px 0 0 85px' class="product-button">-->
<!--                            <input type='submit' value='  Login  '>-->
<!--                            <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'listproducts.php'"/>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--    </div>-->

<?php
include('includes/footer.php');
