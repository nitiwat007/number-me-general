<?php

include('../adodb/adodb.inc.php');


$dbTools = NewADOConnection('mysql');
// $dbGenBook->Connect("���� server", "username", "password", "database");
$dbTools->Connect("localhost", "fatimah", "qtryy9697", "tools");
mysql_query("SET NAMES 'tis620' ");


/* $dbCentral = NewADOConnection('mysql');
  //$dbCentral->Connect("���� server", "username", "password", "database");
  $dbCentral->Connect("phoenix.eng.psu.ac.th","hftimah", "imah0156", "CENTRAL"); */
?>
