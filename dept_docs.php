<?php 

require("inc/config/db.php");

if(!isset($_SESSION)) {

  session_start();

}

$session = $_SESSION['user'];

$getData = new Database;

$userInfo = $getData->getUserInfo($session)->fetch_assoc();

$access = $userInfo['dept'];

$query = "SELECT * FROM up WHERE type = 'In use' && access LIKE '%$access%'";

echo $getData->numRows($query);

?>