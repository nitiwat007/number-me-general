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
        <title>ระบบออกเลขหนังสือราชการ ภาควิชาวิศวกรรมเครื่องกล</title>
        <meta name="description" content="cycling sport website">
        <meta name="keywords" content="cycling sport">
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
        <!-- <link rel="stylesheet" href="css/bulma-0.4.0/css/bulma.css"> -->

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
                            <!--DWLayoutTable-->
                            <!-- <tr valign="middle">
                      <td width="50" height="26"></td>
                      <td width="140"></td>
                      <td width="80"></td>
                      <td width="260"></td>
                      <td width="245"></td>
                      <td width="60"></td>
                    </tr> -->
                            <tr>
                                <td colspan="6">
                                    <h4>ออกเลขหนังสือราชการย้อนหลัง</h4></td>
                            </tr>
                            <form name="form" method="post">
                                <tr>
                                    <td height="26" colspan="6" valign="top">
                                        <?
                                        $query			= "select * from typedoc";
                                        mysql_select_db('numberme',$connect);
                                        $result 			= mysql_query($query ,$connect);
                                        if(!$result)	{
                                        exit;
                                        }
                                        ?>
                                        <div class="col-md-2 col-md-offset-3 text-right">กรุณาเลือก : </div>
                                        <div class="col-md-4"><select class="form-control" name="typedoc">
                                                <option value=" " selected>:: ประเภทหนังสือ ::</option>
                                                <?
                                                while ($object = mysql_fetch_object($result))	{
                                                ?>
                                                <option value=<? echo $object->ID_TypeDoc;?>>
                                                        <? echo $object->Name_TypeDoc;?>
                                            </option>
                                            <?
                                            }
                                            ?>
                                        </select></div>

                                    <div class="col-md-3"><input class="form-control" name="date1" type="text" id="date1" value="" placeholder="วว-ดด-ปปปป" size="10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="26" colspan="6" valign="top">
                                    <div align="right"><strong>
                                            <input class="btn btn-success col-md-2 col-md-offset-10" type="submit" name="Submit" value="ตกลง">
                                        </strong></div>
                                </td>
                            </tr>
                        </form>
                        <?
                        if(isset($_POST['Submit'])){
                        $Submit=$_POST['Submit'];
                        $typedoc=$_POST['typedoc'];;
                        //$numb=$_POST['numb'];;
                        //$year=$_POST['year'];;
                        }else{
                        //echo "0";
                        $Submit="";
                        $typedoc="";
                        $numb="";
                        $year="";
                        }
                        if  (($Submit== "ตกลง") && ($typedoc !=" "))
                        {
                        $typedoc	 		= $_POST["typedoc"];
                        $date11	 			= $_POST["date1"];
                        if(isset($_POST['date2'])){
                        $date21				= $_POST["date2"];
                        }

                        $dd1				= substr($date11,0,2);
                        $mm1				= substr($date11,3,2);
                        $yy1				= substr($date11,6,4)-543;
                        $date1 				= $yy1."-".$mm1."-".$dd1;

                        $sql1				= "select * from typedoc where ID_TypeDoc like '$typedoc'";
                        mysql_select_db('numberme',$connect);
                        $query1				= mysql_query($sql1 ,$connect);

                        $result				= mysql_fetch_array($query1);
                        $ID_TypeDoc			= $result['ID_TypeDoc'];
                        $Name_TypeDoc		= $result['Name_TypeDoc'];

                        ?>
                        <tr>
                            <td height="26" colspan="6" valign="top">
                                <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายงานเลขหนังสือที่ต้องการ</font></strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td height="26" valign="middle" bgcolor="#99CCFF">
                                <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div>
                            </td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                        </tr>
                        <?
                        $sql				= "select * from numcontrol where ID_TypeDoc = '$typedoc' and Date_NumControl = '$date1' and Num_NumControl not like '%.%' order by Num_NumControl DESC";
                        mysql_select_db('numberme',$connect);
                        $query2				= mysql_query($sql ,$connect);

                        $num_rows 			= mysql_num_rows($query2);
                        $num_fields			= mysql_num_fields($query2);

                        $i=0;

                        while($i<$num_rows)	{
                        $result				=mysql_fetch_array($query2);
                        $Num_NumControl		=$result['Num_NumControl'];
                        $From_NumControl	=$result['From_NumControl'];
                        $To_NumControl		=$result['To_NumControl'];
                        $Sub_NumControl		=$result['Sub_NumControl'];
                        $File_NumControl	=$result['File_NumControl'];
                        $Date_NumControl	=$result['Date_NumControl'];
                        $Sen_NumControl		=$result['Sen_NumControl'];


                        if(($i%2)==0)
                        {
                        $bg="whitesmoke";
                        }
                        if(($i%2)==1)
                        {
                        $bg="white";
                        }

                        ?>
                        <tr valign="middle">
                            <td height="20" valign="middle" bgcolor="#FFFFCC">
                                <div align="center"><img src="animation/Bullet02.gif" width="6" height="11"><img src="animation/Bullet02.gif" width="6" height="11"><img src="animation/Bullet02.gif" width="6" height="11"></div>
                            </td>
                            <td colspan="5" valign="top" bgcolor="#FFFFCC"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><a href="backnumber.php?Num_NumControl=<? echo $Num_NumControl;?>&&ID_TypeDoc=<? echo $ID_TypeDoc;?>&&Date_NumControl=<? echo $Date_NumControl;?>">แทรก</a></font></td>
                        </tr>
                        <tr>
                            <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $i+1;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $Name_TypeDoc."/".$Num_NumControl;?>
                                </font></td>
                            <?
                            $d		= substr($Date_NumControl,8,2);
                            $m		= substr($Date_NumControl,5,2);
                            $y		= substr($Date_NumControl,0,4)+543;
                            ?>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $d."-".$m."-".$y;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <font color="#009999">จาก
                                        <? echo $From_NumControl;?>
                                    </font>
                                    <br>
                                    <font color="#993366">ถึง
                                        <? echo $To_NumControl;?>
                                    </font>
                                    <br>
                                    <font color="#0000FF">ผู้ขอเลข
                                        <?
                                        $query				= "select * from member_detail where ID_Member = '$Sen_NumControl'";
                                        mysql_select_db('numberme',$connect);
                                        $result 			= mysql_query($query, $connect);

                                        $result1			= mysql_fetch_array($result);
                                        $Name_Member_Sen	= $result1['Name_Member'];

                                        echo $Name_Member_Sen;?>
                                    </font> </font>
                            </td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $Sub_NumControl;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <?
                                    if ($File_NumControl != "-"){
                                    ?>
                                    <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                    <?
                                    }
                                    else {
                                    echo $File_NumControl;
                                    }
                                    ?>
                                </font></td>
                        </tr>
                        <?
                        $i++;
                        }
                        }
                        ?>
                    <!-- <tr valign="middle">
        <td height="32"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr> -->
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
