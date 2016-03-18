<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the review page, " . $_SESSION['username'] . "!";
} else {
    echo "Please log in or create an account to write a review.";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review Page</title>
<link rel="stylesheet" type="text/css" href="signupstyle.css">

</head>
</html>