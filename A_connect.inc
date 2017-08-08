<?
$host   		= "localhost";
$uname  		= "itdevadmin";
$passwd			= "itdev12345*";
$connect		= mysql_connect($host,$uname,$passwd);

@mysql_query("SET CHARACTER SET utf8; ");
@mysql_query("SET collation_connection = 'utf8_unicode_ci'; ");
?>
