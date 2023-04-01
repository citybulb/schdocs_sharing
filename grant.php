<?php

require("inc/config/grant_perm.php");

if($data->grantPerm(array($im,$id)) === true) {


?>

<h6 class="noti-s mb-3 text-center">Success <i class="fa fa-check-circle"></i></h6>

<?php }

else {

	?>

	<h6 class="noti-f mb-3 text-center">Could not process request <i class="fa fa-times"></i></h6>

<?php }
?>
