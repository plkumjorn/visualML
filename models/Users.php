<?php

include('db_util.php');

function insertUser($username, $email, $password){
	global $db;
	if(!isset($db)) return false;
	$q = "INSERT INTO visualml_users (username, email, password) 
			VALUES ('".$username."',
					'".$email."',
					'".$password."')";
	return mysqli_query($db,$q);
}

function findUser($username){
	global $db;
	if(!isset($db)) return false;
	$q = 'SELECT * FROM visualml_users WHERE username = "'.$username.'"';
	$r = mysqli_query($db,$q);
	if($r = mysqli_query($db,$q)){
		$row = mysqli_fetch_assoc($r);
		return $row;
	}
	return false;
}

function isUsernameExist($username){
	global $db;
	if(!isset($db)) return false;
	$q = 'SELECT * FROM visualml_users WHERE username = "'.$username.'"';
	$r = mysqli_query($db,$q);
	return mysqli_num_rows($r) > 0;
}

function updateUserEmail($username, $email){
	global $db;
	if(!isset($db)) return false;
	$q = 'UPDATE visualml_users '.
			'SET email = "'.$email.'" '.
			'WHERE username = "'.$username.'"';
	return mysqli_query($db,$q);
}

function updateUserWithNewPassword($username, $email, $password){
	global $db;
	if(!isset($db)) return false;
	$q = "UPDATE visualml_users ".
			"SET email = '".$email."' ".
			", password = '".$password."' ".
			"WHERE username = '".$username."'";
	return mysqli_query($db,$q);
}

?>