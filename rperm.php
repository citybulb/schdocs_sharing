<?php

require("db.php");

$id = $_POST['id'];

$imt = $_POST['imt'];

$css = $_POST['css'];

$cpt = $_POST['cpt'];

$arr = array($imt,$css,$cpt);

$im = implode(' ', $arr);

$data = new Database;

if($data->revokePerm(array($im,$id)) === true) {


?>

<h6 class="noti-s mb-3 text-center">Success <i class="fa fa-check-circle"></i></h6>

<?php }

else {

	?>

	<h6 class="noti-f mb-3 text-center">Could not process request <i class="fa fa-times"></i></h6>

<?php }
?>
