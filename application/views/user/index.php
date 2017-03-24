<!DOCTYPE html>
<html>
<head>
	<title>Toko Poster</title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open("user_controller/login"); ?>	
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
				<input type="hidden" name="level" value="Buyer">
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	<?php echo form_close(); ?>
	</form>
</body>
</html>