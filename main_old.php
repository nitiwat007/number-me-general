<?php
session_start();
require_once('lib/check.inc.php');
include("connect/conn_db_oracle.php");
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
//echo $Name_Member;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>ระบบออกเลขหนังสือราชการ ภาควิชาวิศวกรรมเครื่องกล</title>
        <meta name="description" content="cycling sport website">
        <meta name="keywords" content="cycling sport">
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- bootstrap3 -->
        <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
        <!-- bootstrap3 -->

    </head>
    <body>
        <div id="page">

            <?php require('UserControl/topMenu.php'); ?>

            <div id="body_area">
                <div style="border:#5b7c01 solid 1px;padding:4px 6px 2px 6px">
                    <table width="835" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->
                        <tr valign="middle">
                            <td width="50" height="26">&nbsp;</td>
                            <td width="140">&nbsp;</td>
                            <td width="80">&nbsp;</td>
                            <td width="260">&nbsp;</td>
                            <td width="11">&nbsp;</td>
                            <td width="234">&nbsp;</td>
                            <td width="60">&nbsp;</td>
                        </tr>
                        <?
                        include("A_connect.inc");
                        //include("A_connect2.inc");
                        ?>
                        <tr>
                            <td height="26" colspan="7" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขที่
                                            มอ 980/XXX ล่าสุด</font></strong></div></td>
                        </tr>
                        <tr>
                            <td height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                            <td colspan="2" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                        </tr>
                        <?
                        $y					= date("Y");
                        $sql				= "select * from numcontrol where ID_TypeDoc = '1' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                        mysql_select_db('numberme',$connect);
                        $query2				= mysql_query($sql, $connect) or die(mysql_error());

                        $num_rows 			= mysql_num_rows($query2);
                        $num_fields			= mysql_num_fields($query2);

                        $i=0;

                        while($i<3)	{
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
                        <tr>
                            <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $i+1;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo "มอ 980/".$Num_NumControl;?>
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
                                    </font> <br>
                                    <font color="#993366">ถึง
                                        <? echo $To_NumControl;?>
                                    </font> <br>
                                    <font color="#0000FF">ผู้ขอเลข/ผู้บันทึก
                                        <?
                                        $query_oracle = "SELECT * from p_staff WHERE staff_id='$Sen_NumControl'";
                                        $parse_oracle = oci_parse($connect_oracle, $query_oracle);
                                        oci_execute($parse_oracle,OCI_DEFAULT);
                                        $result_oracle = oci_fetch_array($parse_oracle,OCI_BOTH);
                                        $Name_Member_Sen	= $result_oracle['STAFF_NAME_THAI']." ".$result_oracle['STAFF_SNAME_THAI'];
                                        echo $Name_Member_Sen;

                                        ?>
                                    </font> </font></td>
                            <td colspan="2" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $Sub_NumControl;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <?
                                    if ($File_NumControl != "-" && $File_NumControl != null){
                                    ?>
                                    <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                    <?
                                    }
                                    else if($File_NumControl == null){
                                    echo "-";
                                    }else{
                                    echo $File_NumControl;
                                    }
                                    ?>
                                </font></td>
                        </tr>
                        <?
                        $i++;
                        }
                        ?>
                        <tr>
                            <td height="26" colspan="7" valign="top"><div align="center"><strong></strong></div></td>
                        </tr>
                        <tr>
                            <td height="26" colspan="7" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขที่
                                            ศธ 0521.3/XXX ล่าสุด</font></strong></div></td>
                        </tr>
                        <tr>
                            <td height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                            <td colspan="2" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                        </tr>
                        <?
                        $y					= date("Y");
                        $sql				= "select * from numcontrol where ID_TypeDoc = '2' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                        mysql_select_db('numberme',$connect);
                        $query2				= mysql_query($sql, $connect);

                        $num_rows 			= mysql_num_rows($query2);
                        $num_fields			= mysql_num_fields($query2);

                        $i=0;

                        while($i<3)	{
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
                        <tr>
                            <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $i+1;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo "ศธ 0521.3/".$Num_NumControl;?>
                                </font></td>
                            <?
                            if($Date_NumControl!=null){
                            $d		= substr($Date_NumControl,8,2);
                            $m		= substr($Date_NumControl,5,2);
                            $y		= substr($Date_NumControl,0,4)+543;
                            //$y		= substr($Date_NumControl,0,4);
                            $sdate=$d."-".$m."-".$y;
                            }else{
                            $sdate="-";
                            }

                            ?>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $sdate;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <font color="#009999">จาก
                                        <? echo $From_NumControl;?>
                                    </font> <br>
                                    <font color="#993366">ถึง
                                        <? echo $To_NumControl;?>
                                    </font> <br>
                                    <font color="#0000FF">ผู้ขอเลข/ผู้บันทึก
                                        <?
                                        $query				= "select * from member_detail where ID_Member = '$Sen_NumControl'";
                                        mysql_select_db('numberme',$connect);
                                        $result 			= mysql_query($query, $connect);

                                        $result1			= mysql_fetch_array($result);
                                        $Name_Member_Sen	= $result1['Name_Member'];

                                        echo $Name_Member_Sen;?>
                                    </font> </font></td>
                            <td colspan="2" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $Sub_NumControl;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <?

                                    if ($File_NumControl != "-" && $File_NumControl != null){
                                    ?>
                                    <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                    <?
                                    }
                                    else if($File_NumControl == null){
                                    echo "-";
                                    }else{
                                    echo $File_NumControl;
                                    }
                                    ?>
                                </font></td>
                        </tr>
                        <?
                        $i++;
                        }
                        ?>
                        <tr valign="middle">
                            <td height="26"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="footer">
                <?php require('UserControl/footer.php'); ?>
            </div>
        </div>

    </body>
</html>
