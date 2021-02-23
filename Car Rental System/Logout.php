<?php
    session_start();
    session_destroy();
	header("location:Home2.php");
    exit();
?>