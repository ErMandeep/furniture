<?php ob_start(); ?>
<?php
	require_once("admin/config/db.php");
	
	if(!empty($_GET["id"])) {
	$query = "UPDATE user set status = 'active' WHERE activatecode='" . $_GET["id"]. "'";
	$result = mysqli_query($connection, $query);

		if(!empty($result)) {
			$message = '<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Your account is activated Successfully</title>
  
</head>

<body>

  <html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type= "text/css">
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h2>Your account is activated Successfully</h2>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		
	</div>

	<!-- <footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©2014 | All Rights Reserved</p>
	</footer> -->
</body>
</html>
  
  

</body>

</html>
';
		} else {
			$message = "try again";
		}
	}else{
		header('Location: 404.html');
	}



?>
<html>
<head>
<title>PHP User Registration Form</title>
<link href="css/activation/style.css" rel="stylesheet">
</head>
<body>
<?php if(isset($message)) { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>

Click Here to <a href="login.php">Login</a>
</body></html>
		