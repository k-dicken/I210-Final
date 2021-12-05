<?php

$page_title = "Oishii - Signup";
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
<!-- Working login page design-->
    <div id="signup">
        <p class="p-title">Create Account</p>

        <form action="register.php" method="post">
            <div class="name-wrapper">
                <div class="input-wrapper">
                    <label for="first_name">First Name</label>
                    <input class="login-field" name="first_name" type="text" required>
                </div>
                <div class="input-wrapper">
                    <label for="last_name">Last Name</label>
                    <input class="login-field" name="last_name" type="text" required>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="username">Username</label>
                <input name="username" type="text" class="login-field" required>
            </div>
            <div class="input-wrapper">
                <label for="password">Password</label>
                <input type='password' name='password' class="login-field" required>
            </div>
            <div class="input-wrapper">
                <label for="user_email">Email</label>
                <input class="login-field" name="user_email" type="email" required>
            </div>
            <div class="input-wrapper">
                <label for="address">Address</label>
                <input class="login-field" name="address" type="text" required>
            </div>

            <input id="submit" type="submit" onclick="window.location.href ='register.php'" value="Sign Up"/>
        </form>
        <p class="p-textLarge">Already have an account? <a href="userlogin.php">Login!</a></p>
    </div>

<!--testing signup page-->

<!--<div class="login-container">-->
    <!-- display the registration form -->
<!--    <div class="registration">-->
<!--        <form action="register.php" method="post">-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <td colspan="2" align="left">If you do not have an account, please create an account.<br><br></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td style="width: 85px">First Name:</td>-->
<!--                    <td><input name="first_name" type="text" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Last Name:</td>-->
<!--                    <td><input name="last_name" type="text" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>User Name:</td>-->
<!--                    <td><input name="username" type="text" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Password:</td>-->
<!--                    <td><input name="password" type="password" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Email:</td>-->
<!--                    <td><input name="user_email" type="email" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Address:</td>-->
<!--                    <td><input name="address" type="text" required></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td colspan="2" style='padding: 10px 0 0 80px' class="bookstore-button">-->
<!--                        <input type="submit" value="Register" onclick="window.location.href ='register.php'"/>-->
<!--                        <input type="button" value="Cancel" onclick="window.location.href = 'listproducts.php'"/>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            </table>-->
<!---->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->


<?php

require_once('includes/footer.php');

?>
