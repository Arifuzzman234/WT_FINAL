<?php include 'MainHeader.php'; ?>
<?php include '../Controllers/UserControll.php'; ?>
 <html>
    <head></head>
	<body>
	    <div align="center">
		    <h3>Login</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <div>
				    <h4>Username</h4>
					<input type = "text" name = "uname" value="<?php echo $uname; ?>"/>
					<span> <?php echo $err_uname; ?> </span>
				</div>
				<div>
				    <h4 align="center">Password</h4>
					<input type = "password"  name = "pass"/>
					<span> <?php echo $err_pass; ?> </span>
				</div>
				<div>
					<input type = "submit" name = "login" value = "Login"/>
				</div>
				<div>
					<a href = "SignUp.php" >Not Registered Yet? Sign Up</a>
				</div>
			</form>
		</div>
	</body>
    <?php include 'Footer.php'; ?>
</html>