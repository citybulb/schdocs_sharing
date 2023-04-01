<?php

if(isset($_GET['id'])) {

	require("inc/config/db.php");

	$del = new Database;

	$param_value_array = $_GET['id'];

	if($send = $del->deleteQ(array($param_value_array)) == true) {

		return true;
	}

}

?>