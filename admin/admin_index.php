<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Taylor Eaves - Login Assignment</title>
<link rel="stylesheet" href="../admin/css/app.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>

<br><br>
<h2 id="welcomeMsg">
		<?php
		echo $_SESSION['user_name'];
?></h2>
		<br>
	<div class="listButCon"><a href="admin_createuser.php" class="listBut">Create User</a></div><br><br>
	<div class="listButCon"><a href="admin_edituser.php" class="listBut">Edit User</a></div><br><br>
	<div class="listButCon"><a href="admin_deleteuser.php" class="listBut">Delete User</a></div><br><br>
	<div class="listButCon"><a href="phpscripts/caller.php?caller_id=logout" class="listBut">Sign Out</a></div><br><br>

</body>
</html>
