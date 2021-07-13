<?php include 'MainHeader.php'; ?>
<?php include '../Controllers/UserControll.php'; ?>
 <html>
    <head></head>
	<body>
	    <div align="center">
		    <h3>Sign Up</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <div>
				    <h4>Name</h4>
					<input type = "text" name = "name" value="<?php echo $name; ?>"/>
					<span> <?php echo $err_name; ?> </span>
				</div>
				<div>
				    <h4>Username</h4>
					<input type = "text" name = "uname" value="<?php echo $uname; ?>"/>
					<span> <?php echo $err_uname; ?> </span>
				</div>
				<div>
				    <h4>Email</h4>
					<input type = "text" name = "email" value="<?php echo $email; ?>"/>
					<span> <?php echo $err_email; ?> </span>
				</div>
				<div>
				    <h4>Password</h4>
					<input type = "password" name = "pass"/>
					<span> <?php echo $err_pass; ?> </span>
				</div>
				<div>
					<input type = "submit" name = "signUp" value = "Sign Up" />
				</div>
			</form>
		</div>
	</body>
    <?php include 'Footer.php'; ?>
</html>