<?php

session_start();
require_once('lib/check.inc.php');
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
echo "Please Upload PDF File only OR Upload not complete";
?>
