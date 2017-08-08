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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>ระบบออกเลขหนังสือราชการ วิทยาเขตภูเก็ต</title>
        <meta name="description" content="cycling sport website">
        <meta name="keywords" content="cycling sport">
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- bootstrap3 -->
        <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="css/navbar.css" rel="stylesheet">
        <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
        <!-- bootstrap3 -->

    </head>
    <body>
      <div class="container">
        <div id="page">

            <?php require('UserControl/topMenu.php'); ?>

            <div id="body_area">
                <div>
                    <table class="table table-bordered">

                        <form  name="form" method="post">
                            <tr>
                                <td height="26" colspan="4" valign="top">
                                  <div class="col-md-2 col-md-offset-8 text-right">กรุณาเลือก : </div>
                                  <div class="col-md-2">
                                            <select class="form-control" name="year" id="year">
                                                <option value=" ">:: ปี ::</option>
                                                <? for($i=0; $i<=4; $i++) {?>
                                                <option value="<? echo date("Y")-$i?>">
                                                        <? echo date("Y")-$i+543?>
                                            </option>
                                            <? }?>
                                        </select>
                                      </div>
                                    </div></td>
                        </tr>
                        <tr>
                            <td height="26" colspan="4" valign="top"><div align="right"><strong>
                                        <input class="btn btn-success" type="submit" name="Submit" value="ตกลง">
                                    </strong></div></td>
                        </tr>
                    </form>
                    <?
                    if(isset($_POST['Submit'])){
                    $Submit=$_POST['Submit'];
                    $typedoc=isset($_POST['typedoc']) ? $_POST['typedoc'] : 1;
                    //$numb=$_POST['numb'];;
                    $year=$_POST['year'];
                    }else{
                    //echo "0";
                    $Submit="";
                    $typedoc="";
                    $numb="";
                    $year="";
                    }
                    if  (($Submit== "ตกลง") && ($year !=" "))
                    {
                    $year	 			=   $_POST["year"];


                    ?>
                    <tr>
                        <td height="26" colspan="4" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จำนวนเอกสาร
                                        ปี
                                        <? echo $year+543;?>
                                    </font></strong></div></td>
                    </tr>
                    <?
                    $sql				= "select * from numcontrol where Year_NumControl = '$year'";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;
                    $total=0;
                    $file=0;

                    while($i<$num_rows)	{
                    $result				=mysql_fetch_array($query2);
                    $File_NumControl	=$result['File_NumControl'];

                    if ($File_NumControl != "-"){

                    $PDFPath = "upload/".$File_NumControl;
                    $stream = fopen($PDFPath, "r");
                    $PDFContent = @fread ($stream, filesize($PDFPath));
                    //if(!$stream || !$PDFContent)
                    //echo "Not Read";

                    $firstValue = 0;
                    $secondValue = 0;
                    if(preg_match("/\/N\s+([0-9]+)/", $PDFContent, $matches)) {
                    $firstValue = $matches[1];
                    }

                    if(preg_match_all("/\/Count\s+([0-9]+)/s", $PDFContent, $matches))
                    {
                    $secondValue = max($matches[1]);
                    }
                    $page = ($secondValue != 0) ? $secondValue : max($firstValue, $secondValue);
                    //echo $page;
                    //echo "<br>";
                    $file =$file+1;
                    $total =$total+$page;
                    }
                    $i++;
                    }
                    //echo $total;

                    ?>
                    <tr>
                        <td height="26" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จำนวนเอกสาร</font></div></td>
                        <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $file; ?></font></td>
                        <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์</font></td>
                    </tr>
                    <tr>
                        <td height="26" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จำนวนหน้าเอกสารทั้งหมด</font></div></td>
                        <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $total;?>
                            </font></td>
                        <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หน้า</font></td>
                    </tr>
                    <?
                    }
                    ?>

                </table>
            </div>
        </div>
        <div id="footer">
            <?php require('UserControl/footer.php'); ?>
        </div>
        </div>
    </div>

</body>
</html>
