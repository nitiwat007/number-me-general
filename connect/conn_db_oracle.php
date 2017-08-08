<?php
ini_set('display_errors',"1");
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = nora.psu.ac.th)(PORT = 1521)))(CONNECT_DATA=(SID=psu)))";
$connect_oracle = oci_connect("tnitiwat ", "duio098", $db, "utf8");

?>
