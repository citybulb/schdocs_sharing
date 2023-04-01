<?php

if(isset($_GET['id'])) {

	require("inc/config/db.php");

	$res = new Database;

	$param_value_array = $_GET['id'];

	if($send = $res->rStore(array($param_value_array)) == true) {

		return true;
	}

}

?>