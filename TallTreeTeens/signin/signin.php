<!--http://getbootstrap.com/examples/signin/-->

<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
  header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
  $email = mysql_real_escape_string($_POST['email']);
  $upass = mysql_real_escape_string($_POST['pass']);
  
  $email = trim($email);
  $upass = trim($upass);
  
  $res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
  $row=mysql_fetch_array($res);
  
  $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if($count == 1 && $row['user_pass']==md5($upass))
  {
    $_SESSION['user'] = $row['user_id'];
    header("Location: home.php");
  }
  else
  {
    ?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
  }
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- TO DO: MAKE ICON -->
    <link rel="icon" href="http://cliparts.co/cliparts/piq/KRo/piqKRo74T.png">

    <title>Tall Tree Teens</title>
    <!-- <link href="styles/main.css" rel="stylesheet" type="text/css"/> -->

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/signin.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>

<div class="with-bg-size" style="position:fixed; top:0px; left:0px; z-index:-2; width:100%; margin:auto;">
  <div id="color-overlay"></div>
</div>

<div class="card">

</div>






    <div class="container">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>


</table>
</form>
</div>
</center>
      <form class="form-signin" method="post">
      <form >
        <h2 class="form-signin-heading"><span style="color:#ffffff;">Tall Tree Teens</span></h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> <span style="color:#ffffff;"> Remember me </span>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="btn-login" type="submit">Sign in</button>
      </form>
    </div>

    <a href="register.php" class="btn btn-info" role="button">Sign Up Here</a></td>

    <!-- <a href="feed.html" class="btn btn-info" role="button">Browse Topics</a> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
