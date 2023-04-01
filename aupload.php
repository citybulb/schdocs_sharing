<?php

require("inc/config/db.php");

$name = $_FILES['fid']['name'];

$f_img = $_FILES['fid']['tmp_name'];

$img_dir = "docs/";

$img_name = $img_dir . basename($_FILES['fid']["name"]);

$img_accepted = array("pdf","docx","ppt","pptx","doc");

$img_ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));

if( in_array($img_ext,$img_accepted) ) {

	$send_data = new Database();

	$query = "INSERT INTO `up` (`name`) VALUES (?)";

	$send_data->create_data($query,"s",array($name));

	move_uploaded_file($f_img,$img_dir.$name);

}

?>