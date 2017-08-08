<?php
session_start();
require_once('lib/check.inc.php');
include("A_connect.inc");
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


        $Date_NumControl	 		=   isset($_POST['Date_NumControl']) ? $_POST['Date_NumControl'] : null;
        $From_NumControl      =   isset($_POST['From_NumControl']) ? $_POST['From_NumControl'] : null;
        $From_NumControl1	 		=   isset($_POST['From_NumControl']) ? $_POST['From_NumControl'] : null;
        $ID_NumControl	 			=   isset($_POST['ID_NumControl']) ? $_POST['ID_NumControl'] : null;
        $ID_TypeDoc	 				=   isset($_POST['ID_TypeDoc']) ? $_POST['ID_TypeDoc'] : null;
        $circular	 				=   isset($_POST['circular']) ? $_POST['circular'] : 0;
        $Num_NumControl	 			=   isset($_POST['$Num_NumControl']) ? $_POST['$Num_NumControl'] : null;
        $ID_TypeFloder	 			=   isset($_POST['ID_TypeFloder']) ? $_POST['ID_TypeFloder'] : null;
        $ddlMM	 					=   isset($_POST['ddlMM']) ? $_POST['ddlMM'] : null;
        // $day	 					=   isset($_POST['day']) ? $_POST['day'] : null;
        // $month	 					=   isset($_POST['month']) ? $_POST['month'] : null;
        // $year	 					=   isset($_POST['year']) ? $_POST['year'] : null;
        $Sub_NumControl	 			=   isset($_POST['Sub_NumControl']) ? $_POST['Sub_NumControl'] : null;
        $To_NumControl	 			=   isset($_POST['To_NumControl']) ? $_POST['To_NumControl'] : null;
        $user_request_name	 			=   isset($_POST['user_request_name']) ? $_POST['user_request_name'] : null;
        $user_request_section	 			=   isset($_POST['user_section_value']) ? $_POST['user_section_value'] : null;
        //$ID_Member_From	 			=   isset($_POST['ID_Member_From']) ? $_POST['ID_Member_From'] : 1;
        $NumberDocument=$ID_NumControl;
        $y 					= date("Y");

        $day				= substr($Date_NumControl,0,2);
        $month			= substr($Date_NumControl,3,2);
        $year			= substr($Date_NumControl,6,4);

        $year1	= $year-543;

        $dd			= substr($Date_NumControl,0,2);
        $mm			= substr($Date_NumControl,3,2);
        $yy			= substr($Date_NumControl,6,4)-543;
        $Date_NumControl1 = $yy."-".$mm."-".$dd;


        //  	$sql				= "select * from member_detail where ID_Member ='$ID_Member_From'";
        // mysql_select_db('numberme',$connect);
        // 	$query				= mysql_query($sql, $connect);
        //
        // $result				=mysql_fetch_array($query);
        // $From_NumControl	=$result["Name_Member"];

        /////////////////////////////////new function /////////////////////////////////////////
            function checkFirstRecord($ID_TypeDoc,$y){
              include("A_connect.inc");
              $y 					= date("Y");
              $sql_first_record= "select ID_NumControl from numcontrol where ID_TypeDoc='$ID_TypeDoc' and Year_NumControl = '$y'";
              mysql_select_db('numberme',$connect);
              $query_first_record= mysql_query($sql_first_record ,$connect);
              $num_rows_first_record=mysql_num_rows($query_first_record);
              $isFirstRecord=true;
              if ($num_rows_first_record==0){
                $haveFirstRecord=false;
              }else{
                $haveFirstRecord=true;
              }
              return $haveFirstRecord;
            }
        /////////////////////////////////////////////////////////////////////////////////////////


        if  ($_POST["submit"]== "ตกลง" && $_POST["action"] == "add")
        {

          $MaxNum_NumControl=999;
          if(checkFirstRecord($ID_TypeDoc,$y)){
            $sql_max			= "select (MAX(CAST(Num_NumControl AS DECIMAL(7)))) AS MaxNum_NumControl,startnumber_type as startnumber_type FROM numcontrol,typedoc where numcontrol.ID_TypeDoc=typedoc.ID_TypeDoc and numcontrol.ID_TypeDoc like '$ID_TypeDoc' and numcontrol.Year_NumControl = '$y'";
            mysql_select_db('numberme',$connect);
            $query2				= mysql_query($sql_max ,$connect);
            $num_rows=mysql_num_rows($query2);
            //echo "num_rows= ".$num_rows." Rows";

            $result				= mysql_fetch_array($query2);
            $MaxNum_NumControl	= $result["MaxNum_NumControl"];
            $StartNumberType=$result["startnumber_type"];
          }else{
            $sql_max			= "select startnumber_type,startnumber from typedoc where ID_TypeDoc='$ID_TypeDoc'";
            mysql_select_db('numberme',$connect);
            $query2				= mysql_query($sql_max ,$connect);
            $num_rows=mysql_num_rows($query2);
            //echo "num_rows= ".$num_rows." Rows";

            $result				= mysql_fetch_array($query2);
            $MaxNum_NumControl	= $result["startnumber"];
            $StartNumberType=$result["startnumber_type"];
          }


        //echo var_export(checkFirstRecord($ID_TypeDoc));

        /////////////////////// กำลังทำระบบออกเลข 29-06-2014 เวลา 15:14 ///////////////////////
        // if($MaxNum_NumControl==null){
        //   echo "MaxNum_NumControl= NULL";
        // }else{
        //   echo "MaxNum_NumControl= ".$result["MaxNum_NumControl"];
        // }
        ///////////////////////////////////////////////////////////////////


        //echo "MaxNum_NumControl= ".$result["MaxNum_NumControl"]."<br>";
        //echo "MaxNum_NumControl_length= ".strlen($result["MaxNum_NumControl"])."<br>";
        $NumberDocument=$MaxNum_NumControl+1;

        if($StartNumberType==1){
          switch(strlen($NumberDocument)){
            case 1:
              $NumberDocument="00".$NumberDocument;
              break;
            case 2:
              $NumberDocument="0".$NumberDocument;
              break;
            default:
              echo "not match";
          }
        }else if($StartNumberType==2){
          switch(strlen($NumberDocument)){
            case 1:
              $NumberDocument="6000".$NumberDocument;
              break;
            case 2:
              $NumberDocument="600".$NumberDocument;
              break;
            case 3:
              $NumberDocument="60".$NumberDocument;
              break;
            case 4:
                $NumberDocument="6".$NumberDocument;
                break;
            default:
              echo "not match";
          }
        }

        echo "NumberDocument= ".$NumberDocument."<br>";




         //$Num_NumControl		= $MaxNum_NumControl+1;

        if ($NumberDocument){
        $sql				= "insert into numcontrol values(null,'$ID_TypeDoc','$ID_TypeFloder','$ddlMM','$year1','$NumberDocument','$To_NumControl','$Sub_NumControl','$From_NumControl','$ID_Member','-','$user_request_name','$user_request_section','$year1-$month-$day',$circular)";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);
        //echo $Date_NumControl;
        echo $sql;
        }
        $url = "explain.php?Num_NumControl=$NumberDocument && circular=$circular && ID_TypeDoc=$ID_TypeDoc";
        }

        if  ($_POST["submit"]== "ตกลง" && $_POST["action"] == "addback")
        {
        $sql				= "select * FROM numcontrol where ID_TypeDoc like '$ID_TypeDoc' and Year_NumControl = '$yy' and (Num_NumControl like '$NumberDocument' or Num_NumControl like '$NumberDocument.%')";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);

        $num_rows 			= mysql_num_rows($query2);
        echo $num_rows;
        $NumberDocument		=$NumberDocument.".".$num_rows;

        if ($NumberDocument){
        $sql				= "insert into numcontrol values(null,'$ID_TypeDoc','$ID_TypeFloder','$ddlMM','$yy','$NumberDocument','$To_NumControl','$Sub_NumControl','$From_NumControl','$ID_Member','-','$user_request_name','$user_request_section','$Date_NumControl1')";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);
        }
        $url = "explain.php?Num_NumControl=$NumberDocument && ID_TypeDoc=$ID_TypeDoc";
        }

        if  ($_POST["submit"]== "ตกลง" && $_POST["action"] == "edit")
        {
        if ($NumberDocument){
        $sql				="update numcontrol  set ID_TypeFloder='$ID_TypeFloder', Sub_NumControl = '$Sub_NumControl', To_NumControl = '$To_NumControl', From_NumControl = '$From_NumControl1', user_request_name='$user_request_name',user_request_section='$user_request_section',Date_NumControl='$year1-$month-$day' where ID_NumControl = '$ID_NumControl'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);
        }
        $url = "managedocument.php";
        }

        if  ($_POST["submit"]== "ตกลง" && $_POST["action"] == "del")
        {
        $sql					= "delete from numcontrol where ID_NumControl = '$ID_NumControl'";
        mysql_select_db('numberme',$connect);
        $query2				= mysql_query($sql, $connect);
        $url = "managedocument.php";
        }

        if  ($_POST["submit"]== "ตกลง" && $_POST["action"] == "upload")
        {
        $realname 	= $_FILES['userfile']['name'];
        $pdf		="pdf";

        if (is_uploaded_file($_FILES['userfile']['tmp_name']))
        {
        if (stristr($realname,$pdf)){
        copy($_FILES['userfile']['tmp_name'], "./upload/$ID_NumControl.pdf");
        echo "Upload Filename: " . $_FILES['userfile']['name'];

        $sql				="update numcontrol  set  File_NumControl ='$ID_NumControl.pdf' where ID_NumControl = '$ID_NumControl'";
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
