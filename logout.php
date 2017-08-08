<?php

session_start();
//session_unregister('access');
//session_unregister('Staff_ID');
//session_unregister('level_status');
unset($_SESSION['access']);
unset($_SESSION['Staff_ID']);
unset($_SESSION['level_status']);
session_destroy();
header("Location: index.php");
?>
