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

        $ID_TypeSubFloder	 		=   $_POST["ID_TypeSubFloder"];
        $ID_TypeFloder	 			=   $_POST["ID_TypeFloder"];
        $Name_TypeSubFloder	 		=   $_POST["Name_TypeSubFloder"];


        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "add")
        {
        if ($Name_TypeSubFloder){
        $sql				= "insert into typesubfloder values(null,'$ID_TypeFloder','$Name_TypeSubFloder')";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "subgroup.php?ID_TypeFloder=$ID_TypeFloder";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "edit")
        {			
        if ($Name_TypeSubFloder){
        $sql				="update typesubfloder  set  Name_TypeSubFloder ='$Name_TypeSubFloder' where ID_TypeSubFloder = '$ID_TypeSubFloder'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "subgroup.php?ID_TypeFloder=$ID_TypeFloder";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "del")
        {			
        $sql					= "delete from typesubfloder where ID_TypeSubFloder = '$ID_TypeSubFloder'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        $url = "subgroup.php?ID_TypeFloder=$ID_TypeFloder";
        }

        echo "<script  type='text/javascript'>location.href = '".$url."'</script>"
        ?>
    </body>
</html>
