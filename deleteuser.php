<?php

$page_title = "Delete Account";

require_once ('includes/header.php');
require_once('includes/database.php');

//if user id cannot retrieved, terminate the script
if (is_null($user_id)) {
    echo "Error: User ID was not found";
    echo $user_id;
    require_once('includes/footer.php');
    exit();
}

//define the MySQL delete statement
$sql = "DELETE FROM users WHERE user_id = $user_id";

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>

    <div id="full">

        <p class="p-title">Account was successfully deleted.</p>

    </div>

<?php
// close the connection.
$conn->close();

include ('includes/footer.php');

//redirect the user to the userprofile.php page
header("Location: logout.php");
