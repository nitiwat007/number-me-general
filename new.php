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

        <div id="page">
            <div class="container">
                <?php require('UserControl/topMenu.php'); ?>

                <div id="body_area">
                    <div>
                        <table class="table table-bordered">
                            <!--DWLayoutTable-->
                            <!-- <tr valign="middle">
                              <td height="26" colspan="2"></td>
                            </tr> -->
                            <tr>
                                <td height="26" colspan="2" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">กรุณาเลือกหนังสือที่ต้องการออกเลข</font></strong></div></td>
                            </tr>
                            <tr>
                                <td width="60" height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                                <td width="775" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                            </tr>
                            <?
                            $sql				= "select * from typedoc where ID_TypeDoc order by ID_TypeDoc";
                            mysql_select_db('numberme',$connect);
                            $query2			= mysql_query($sql, $connect);

                            $num_rows = mysql_num_rows($query2);
                            $num_fields=mysql_num_fields($query2);

                            $i=0;

                            while($i<$num_rows)	{
                            $result				=mysql_fetch_array($query2);
                            $ID_TypeDoc			=$result['ID_TypeDoc'];
                            $Name_TypeDoc		=$result['Name_TypeDoc'];


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
                                <td height="26" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $i+1;?></font></td>
                                <td valign="middle" bgcolor="<?= $bg ?>"><a href="number.php?ID_TypeDoc=<? echo $ID_TypeDoc?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_TypeDoc;?></font></a></td>
                            </tr>
                            <?
                            $i++;
                            }
                            ?>
                            <tr valign="middle">
                                <td height="26" colspan="2"></td>
                            </tr>
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
