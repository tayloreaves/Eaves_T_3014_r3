<?php

	function createUser($fname, $username, $password, $email, $lvllist) {
		require_once('connect.php');
		//$ip = 0;
		$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', 'no', '{$lvllist}', 'no')";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "Please try again.";
			return $message;
		}
		mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');

		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Uh oh. There seems to be an error";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Sorry, unable to delete user.";
			return $message;
		}
		mysqli_close($link);
	}


function randomPass($length) { //function that generates random string with a length parameter
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; //list of available characters for generated string
		$string = ""; //string placeholder variable
		$size = mb_strlen($chars) - 1;
		for($i=0; $i<$length; $i++) { //loop populate $str with random characters from $chars until it reaches the specified $length
			$string .= $chars[random_int(0, $size)];
		}
		return $string;
	}

	function sendEmail($fname, $email, $username, $password) {
		$loginUrl = "admin_login.php";
		$message = "Welcome {$fname}. \r\n Username: {$username} \r\n Password: {$password} \r\n Login here: {$loginUrl}";
		mail($email, 'Welcome', $message);
	}

?>
