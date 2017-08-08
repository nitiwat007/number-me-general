<?php

//include('lib/webconfig.inc.php');
$access = $_SESSION['access'];
if ($access != "pass") {
    header("Location: index.php");
    exit();
}

$hasRole=false;

foreach($_SESSION['roles'] as $role){
  if($role=="Admin"){
    $hasRole=true;
    break;
  }
}
?>
