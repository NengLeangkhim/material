<?php
session_start();
session_destroy();
header("Location: ../../main-app/index.php");
?>