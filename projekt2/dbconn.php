<?php
	# Stop Hacking attempt
	if(!defined('__APP__')) {

		die("Hacking attempt");

	}

	# Connect to MySQL database
	$MySQL = mysqli_connect("localhost","root","","hrbase") or die('Error connecting to MySQL server.');