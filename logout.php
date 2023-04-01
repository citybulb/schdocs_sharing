<?php

  session_start();

  header("location: user.php");

  session_destroy();
?>
