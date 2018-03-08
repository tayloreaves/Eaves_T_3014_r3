<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		//hash $password (this is to mix it up)
		$hashed = hash('hey123', $password);

		if(empty($lvllist)){
			$message = "Please select a user level.";
		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" href="../admin/css/app.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>

	<form action="admin_index.php" method="post">
		<input type="submit" name="submit" value="Back" id="back">
	</form>

	<h2 id="welcomeMsg">Create User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
		<label class="formLabel">First Name:</label>
		<input class="input" type="text" name="fname" value="">

		<label class="formLabel">Username:</label>
		<input class="input" type="text" name="username" value="">

		<label class="formLabel">Password:</label>
		<input class="input" type="text" name="password" value="">

		<label class="formLabel">Email:</label>
		<input class="input" type="text" name="email" value="">
		<br>

		<select name="lvllist" class="formLevel">
			<option value="">Select User Level</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select>
    <br>

		<input class="submitUser" type="submit" name="submit" value="Create User">

  </form>
</body>
</html>
