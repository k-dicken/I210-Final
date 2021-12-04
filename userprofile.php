<?php

$page_title = "Login or register";
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

    <div class="login-container">
        <!-- display the login form -->
        <div class="login">
            <form method='post' action='userlogin.php'>
                <table>
                    <tr>
                        <td colspan="2"><?php echo $message; ?></br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 80px">User name:</td>
                        <td><input type='text' name='username' required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type='password' name='password' required></td>
                    </tr>
                    <tr>
                        <td colspan='2' style='padding: 10px 0 0 85px' class="product-button">
                            <input type='submit' value='  Login  '>
                            <input type="submit" name="Cancel" value="Cancel"
                                   onclick="window.location.href = 'listproducts.php'"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- display the registration form -->
        <div class="registration">
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td colspan="2" align="left">If you do not have an account, please create an account.<br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 85px">First Name:</td>
                        <td><input name="first_name" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input name="last_name" type="text" required></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input name="username" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name="password" type="password" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input name="user_email" type="email" required></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input name="address" type="text" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style='padding: 10px 0 0 80px' class="bookstore-button">
                            <input type="submit" value="Register" onclick="window.location.href ='register.php'"/>
                            <input type="button" value="Cancel" onclick="window.location.href = 'listproducts.php'"/>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

<?php
include('includes/footer.php');
