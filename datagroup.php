<?php
session_start();
require_once('lib/check.inc.php');
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
//echo $Name_Member;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>

        <?	
        include("A_connect.inc");

        $ID_TypeFloder	 			=   $_POST["ID_TypeFloder"];
        $Name_TypeFloder	 		=   $_POST["Name_TypeFloder"];


        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "addgroup")
        {
        if ($Name_TypeFloder){
        $sql				= "insert into typefloder values(null,'$Name_TypeFloder')";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "group.php";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "editgroup")
        {			
        if ($Name_TypeFloder){
        $sql				="update typefloder  set  Name_TypeFloder ='$Name_TypeFloder' where ID_TypeFloder = '$ID_TypeFloder'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "group.php";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "delgroup")
        {			
        $sql				= "delete from typefloder where ID_TypeFloder = '$ID_TypeFloder'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        $url = "group.php";
        }

        echo "<script  type='text/javascript'>location.href = '".$url."'</script>"
        ?>
    </body>
</html>
