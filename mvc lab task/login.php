<?php

include 'controllers/temp.php';

?>





<html>
	<head><title>login</title></head>
	<body>
		<fieldset>
			<form action="" method="post">
			
			<fieldset>

				 <table align="center">
					<tr>
					<br><br><br><br><br><br>
						<td  align="center" colspan="3"><b>LOG IN </td>
						
					</tr>
					<tr>
						<td><b>User Name</td>
						<td>
	           	<input type="text" placeholder="User Name" name="name" value="<?php echo $username;?>"></td>
				<td><span><?php echo $err_username;?></span>

		</td>
					</tr>
					<tr>
						<td><b>Password </td>
						<td><input type="password" name="password" placeholder="Password" value="<?php echo $pass;?>"></td>
						<td><span><?php echo $err_pass;?></span>
					</tr>
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="Login" value="Login"><br>
						<span><h1><?php echo $err_db; ?></h1></span>
						</td>
					</tr>
	                
	
	
	
				</table><br><br><br><br>
				</fieldset>
			</form>
		</fieldset>
	</body>
</html>		