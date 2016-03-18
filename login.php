<?php require_once 'base.php' ?>

<?php
session_destroy();
session_start();
if(isset($_POST['btn-login']))
{
$username = $_POST[ 'username' ];
$password = $_POST[ 'password' ];
$_SESSION['Error'] = "You left one or more of the required fields.";
if ($username&&$password)
{
$connect = mysql_connect ( "localhost", "root" , "") or die ("Couldn't connect!");
mysql_select_db("plumber") or die ("Couldn't find db");

$query = mysql_query("SELECT * FROM customers WHERE CUST_PASSWORD ='$password' AND CUST_SCREENNAME='$username'", $connect);

if (mysql_num_rows($query) == 1)
{
$_SESSION['username']= $username; // Initializing Session
$_SESSION['loggedin'] = true;
header("location: home.php"); // Redirecting To Other Page
}
else {$msg="Incorrect username and password!";

echo $msg;}
}
mysql_close($connect); // Closing Connection
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link rel="stylesheet" type="text/css" href="signinstyle.css">
</head>
<body>
   <div id="title">
        <?php startblock('title')  ?>
			Welcome
		<?php endblock() ?>
        
    
				<center>
				<div id="login-form" >
						<form method="post">
									<table align="center" width="30%" border="0">
											<tr><td><p> Username:<p></td>
											<td><input type="text" name="username" placeholder="Username" required /></td>
											</tr>
											<tr><td><p> Password:<p></td>
											<td><input type="password" name="password" placeholder="Your Password" required /></td>
											</tr>
											<tr><td></td>
											<td><button type="submit" name="btn-login">Sign In</button></td>
											</tr>
											<tr><td></td>
											<td><a href="registration.php">Sign Up Here</a></td>
											</tr>
									</table>
						      </form>
				 </div>

				
	</div>




</body>
</html>