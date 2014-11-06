<?php

	//Description: This page checks the username and password credentials in the database
	//Code based from: http://www.w3schools.com/php/php_forms.asp

	//Gets the Database Info
	require_once("includes/db.php");
	$result = false;

	//Puts the username and password from the login forms into a local variable
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Tests to see whether or not the login was successful
	$result= (VPDB::getInstance()->verify_credentials($_POST['username'], $_POST['password']));

	//If the Login was successful, it redirects to postlogin.php
	if ($result == true) {
	  	session_start();
	 	$_SESSION['username'] = $_POST['username'];
		header('Location: postlogin.php');
		exit;
	}

	//If the Login Fails, the webpage messages back "Login Failed"
	else
	{
		 echo "Login Failed";
	}
?>