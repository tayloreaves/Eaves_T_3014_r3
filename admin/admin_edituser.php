<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link rel="stylesheet" href="../admin/css/app.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>

	<form action="admin_index.php" method="post">
		<input type="submit" name="submit" value="Back" id="back">
	</form>
	
	<h2 id="welcomeMsg">Edit User</h2>

	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label class="formLabel">First Name:</label>
		<input class="input" type="text" name="fname" value="<?php echo $info['user_fname'];  ?>">

		<label class="formLabel">Username:</label>
		<input class="input" type="text" name="username" value="<?php echo $info['user_name'];  ?>">

		<label class="formLabel">Password:</label>
		<input class="input" type="text" name="password" value="<?php echo $info['user_pass'];  ?>">

		<label class="formLabel">Email:</label>
		<input class="input" type="text" name="email" value="<?php echo $info['user_email'];  ?>">
    <br>
		<input class="submitUser" type="submit" name="submit" value="Edit Account">
	</form>
</body>
</html>
