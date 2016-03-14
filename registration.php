<?php
session_start();
require 'dbconnect.php';
if(isset($_POST['btn-signup'])){
$username = strtolower(strip_tags($_POST['username']));
$firstname = strip_tags($_POST['firstname']);
$lastname =strip_tags($_POST['lastname']);
$password =strip_tags($_POST['password']);
$confirmpassword=$_POST['confirmpassword'];
$zipcode=$_POST['zipcode'];
$namecheck = mysql_query("SELECT CUST_SCREENNAME FROM customers WHERE CUST_SCREENNAME='$username'");
$count = mysql_num_rows($namecheck);
if($count!=0)
{
die ("Username already taken!");
}
// all feilds filled
if ($username&&$zipcode&&$firstname&&$lastname&&$password&&$confirmpassword)
{
	// making sure that password and confirm password are the same
	if ($password == $confirmpassword)
	{
	   if(strlen($username) > 25 || strlen($firstname) >25 || strlen($lastname) > 25)
	   {
		echo "Length of username, first name, or last name is too long";
	    }
                      else
	    {
		if (strlen($password) > 25 || strlen($password) < 6)
		{
		echo "Password should be between 6 and 25 characters";
		}
		else
		{
		// registering the user
		$queryreg = mysql_query("INSERT INTO customers (CUST_ID, CUST_SCREENNAME, CUST_PASSWORD, CUST_FNAME, CUST_LNAME, CUST_ZIP) VALUES (' ', '$username', '$password', '$firstname', '$lastname', '$zipcode')");
		die("You have been registered! <a href='login.php'> Return to sign in page</a> ");
		}
	          }
	  }
	else
	      echo "Your passwords do not match!";
}
 else 
	echo"Please fill in <b>all </b> fields!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SignUp Page</title>
<link rel="stylesheet" type="text/css" href="signupstyle.css">

</head>
<body>
<center>
<div id="login-form">
<form action= 'registration.php' method='POST'>
   <tr><td><p>First Name:<p></td>
        <td><input type="text"  name="firstname" placeholder="First Name"></td>
    </tr>
      <tr><td><p>Last Name:<p></td>
        <td><input type="text"  name="lastname" placeholder="Last Name" ></td>
    </tr>
<tr><td><p> Username:<p></td>
<td><input type="text" name="username" placeholder="User Name" /></td>
</tr>
<tr><td><p> Password:<p></td>
<td><input type="password" name="password" placeholder="Your Password" /></td>
</tr>
<tr><td><p> Confirm Password:<p></td>
<td><input type="password" name="confirmpassword" placeholder="Confirm Password" /></td>
</tr>
<tr><td><p>Zip Code:<p></td>
        <td><input type="text"  name="zipcode" placeholder="Zip Code" /></td>
    </tr>
<tr><td><p><p></td>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr><td><p><p></td>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>