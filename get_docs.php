<?php 

require("inc/config/db.php");

$getData = new Database;

$query = "SELECT * FROM up";

echo $getData->numRows($query);

?>