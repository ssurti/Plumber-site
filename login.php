<?php
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

$query = mysql_query("SELECT * FROM customers WHERE CUST_SCREENNAME = '$username'");
$query = mysql_query("select * from customers where CUST_PASSWORD='$password' AND CUST_SCREENNAME='$username'", $connect);
if ($row = mysql_fetch_array($query))
{
$_SESSION['login_user']=$username; // Initializing Session
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
	{% block title %}
	<title>Login page</title>
	{% endblock %}
<link rel="stylesheet" type="text/css" href="signinstyle.css">
{% block header %}{% endblock %}

<!-- Bootstrap core CSS -->
	<!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<link href="css/signin.css'" type="text/css" rel="stylesheet">
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<!-- <link href="navbar-static-top.css" rel="stylesheet"> -->
	<link href="css/navbar-static-top.css" type="text/css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">

	<link href="css/justified-nav.css" type="text/css" rel="stylesheet">

	<link href="css/offcanvas.css" type="text/css" rel="stylesheet">

		<style type="text/css">
    /* Some custom styles to beautify this example */
    .demo-content{
        padding: 15px;
        font-size: 18px;
        min-height: 300px;
        background: #dbdfe5;
        margin-bottom: 10px;
    }
    .demo-content.bg-alt{
        background: #66ccff;
    }
    .list-group{
		width: -99999px;
		background: #66ccff;
	}
    .bs-example{
    	margin: 20px;
    }
    .jumbotron{
    	margin: 0px;
    }
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */
  display: flex;
  align-items: center;
}
body {background-color:lightyellow
;}
div {background-color:lightgray
;}
</style>

</head>
<body>
   <div class="container">
		<div class="masthead">
			<h3 class="text-muted">Website Banner</h3>
    </div>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr><td><p> Username:<p></td>
<td><input type="text" name="username" placeholder="Username" required /></td>
</tr>
<tr><td><p> Password:<p></td>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr><td><p><p></td>
<td><a href="registration.php">Sign Up Here</a></td>
</tr>
      </form>
    </div>

</div>




</body>

<body>
	
	<div class="container">
		<div class="masthead">
			<h3 class="text-muted">Website Banner</h3>
			<ul class="nav nav-justified">

				<li {% if "active" == 'home' %}class="active"{% endif %}>
					<a href="{% url 'home' %}">Home</a>
				</li>
				<li {% if "nbar" == 'about' %}class="active"{% endif %}>
					<a href="{% url 'about' %}">About</a>
				</li>
				<li {% if "nbar" == 'contact' %}class="active"{% endif %}>
					<a href="{% url 'contact' %}">Contact</a>
				</li>
				<li {% if "nbar" == 'list' %}class="active"{% endif %}>
					<a href="{% url 'list' %}">List of Uploads</a>
				</li>
				<li {% if "nbar" == 'list' %}class="active"{% endif %}>
					<a href="{% url 'create_file' %}">Upload A File </a>
				</li>
				{% if user.is_authenticated %}
				<li {% if "nbar" == 'auth_logout' %}class="active"{% endif %}>
					<a href="{% url 'auth_logout' %}">Logout</a>
				</li {% if "nbar" == 'password_change' %}class="active"{% endif %}>
				<li>
					<a href="{% url 'password_change' %}">Change password</a>
				</li>

				{% else %}
				<li {% if "nbar" == 'auth_login' %}class="active"{% endif %}>
					<a href="{% url 'auth_login' %}">Login</a>
				</li>
				<li {% if "nbar" == 'registration_register' %}class="active"{% endif %}>
					<a href="{% url 'registration_register' %}">Register</a>
				</li>
				{% endif %}
			</ul>

		</div><!--/.nav-collapse -->
	</div>

	<div class="container">

		<!-- Jumbotron -->
		<div style="background:lightblue !important" class="jumbotron">

			<h1>
				{% if user.is_authenticated %}

				<h2>Welcome: {{user.userprofile.first_name}}</h2>
				{% if user.userprofile.balance > 0 %}
				<h3>Your current balance is: {{user.userprofile.balance|intcomma}} points</h3>
				{% else %}
				<h4>Your current balance is: 0 points</h4>
				{% endif %}
				{% else %}
				<h3>Welcome, login or create a profile to access files.</h3>
				{% endif %}


			</h1>

		</div>
	</div>
	<div  class="container">
		<div style="background:lightgray !important" class="jumbotron ">
			{% block content %}{% endblock %}
			{% block footer %}{% endblock %}
		</div>
	</div>
</body>
</html>

