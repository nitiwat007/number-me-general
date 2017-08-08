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

        $Date_NoneNum	 			=   $_POST["Date_NoneNum"];
        $From_NoneNum	 			=   $_POST["From_NoneNum"];
        $ID_NoneNum	 				=   $_POST["ID_NoneNum"];
        $ID_TypeDoc	 				=   $_POST["ID_TypeDoc"];
        $Num_NoneNum	 			=   $_POST["Num_NoneNum"];
        $ID_TypeFloder	 			=   $_POST["ID_TypeFloder"];
        $ddlMM	 					=   $_POST["ddlMM"];
        $day	 					=   $_POST["day"];
        $month	 					=   $_POST["month"];
        $year	 					=   $_POST["year"];
        $day1	 					=   $_POST["day1"];
        $month1	 					=   $_POST["month1"];
        $year1	 					=   $_POST["year1"];
        $Sub_NoneNum	 			=   $_POST["Sub_NoneNum"];
        $To_NoneNum	 				=   $_POST["To_NoneNum"];
        $DateOn_NoneNum1			=	$_POST["DateOn_NoneNum"];
        $y 					= 	date("Y");

        $DateOn_NoneNum 			= $year1."-".$month1."-".$day1;
        $Date_NoneNum				= $y."-".$month."-".$day;
        //$year1	= $year-543;

        $dd			= substr($DateOn_NoneNum1,0,2);
        $mm			= substr($DateOn_NoneNum1,3,2);
        $yy			= substr($DateOn_NoneNum1,6,4)-543;


        $sql				= "select * from member_detail where ID_Member ='$ID_Member_From'";
        mysql_select_db('numberme',$connect);
        $query				= mysql_query($sql, $connect);

        $result				=mysql_fetch_array($query);
        $From_NumControl	=$result[Name_Member];


        /*echo "รหัสหนังสือ ID_TypeDoc".$ID_TypeDoc."</br>";
        echo "วันที่บันทึก Date_NoneNum".$day."-".$month."-".$year."</br>";
        echo "รหัสโฟเดอร์ ID_TypeFloder".$ID_TypeFloder."</br>";
        echo "รหัสสับโพเดอร์ ID_TypeSubFloder".$ddlMM."</br>";
        echo "วันที่ในหนังสือ DateOn_NoneNum".$day1."-".$month1."-".$year1."</br>";
        echo "เลขหนังสือ Num_NoneNum".$Num_NoneNum."</br>";
        echo "เรื่อง Sub_NoneNum".$Sub_NoneNum."</br>";
        echo "เรียน To_NoneNum".$To_NoneNum."</br>";
        echo "จาก From_NoneNum".$From_NoneNum."</br>";
        echo "ผู้บันทึกเอกสาร Sen_NoneNum".$ID_Member."</br>";*/


        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "add")
        {

        if ($Num_NoneNum){
        $sql				= "insert into nonenum values(null,'$ID_TypeDoc','$ID_TypeFloder','$ddlMM','$y','$DateOn_NoneNum','$Num_NoneNum','$To_NoneNum','$Sub_NoneNum','$From_NoneNum','$ID_Member','-','$Date_NoneNum')";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "explain.php?Num_NoneNum=$Num_NoneNum && ID_TypeDoc=$ID_TypeDoc";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "edit")
        {			
        if ($Num_NoneNum){
        $sql				="update nonenum  set Num_NoneNum = '$Num_NoneNum', Sub_NoneNum = '$Sub_NoneNum', To_NoneNum = '$To_NoneNum', From_NoneNum = '$From_NoneNum', DateOn_NoneNum = '$yy-$mm-$dd' where ID_NoneNum = '$ID_NoneNum'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        }
        $url = "managedocument.php";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "del")
        {			
        $sql				="delete from nonenum where ID_NoneNum = '$ID_NoneNum'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        $url = "managedocument.php";
        }

        if  ($_POST["Submit"]== "ตกลง" && $_POST["action"] == "upload")
        {			
        $realname 	= $_FILES['userfile']['name'];
        $pdf		="pdf";

        if (is_uploaded_file($_FILES['userfile']['tmp_name']))
        {
        if (stristr($realname,$pdf)){
        copy($_FILES['userfile']['tmp_name'], "./uploadnone/$ID_NoneNum.pdf");
        echo "Upload Filename: " . $_FILES['userfile']['name'];

        $sql				="update nonenum set File_NoneNum ='$ID_NoneNum.pdf' where ID_NoneNum = '$ID_NoneNum'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);						
        $url = "managedocument.php";
        }
        else {
        $url = "upload_numb_complete.php";
        }
        }
        else{
        $url = "upload_numb_complete.php";
        }  
        }

        echo "<script  type='text/javascript'>location.href = '".$url."'</script>"
        ?>
    </body>
</html>
