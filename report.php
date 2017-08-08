<?php
session_start();
require_once('lib/check.inc.php');
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
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" href="css/bulma-0.4.0/css/bulma.css"> -->
    </head>
    <body>
        <div id="page">

            <?php require('UserControl/topMenu.php'); ?>

            <div id="body_area">
                <div style="border:#5b7c01 solid 1px;padding:4px 6px 2px 6px">
                    <table width="835" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->
                        <tr>
                            <td width="835" height="38" valign="top"><blockquote>
                                    <blockquote>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report1.php">ตรวจสอบเลขหนังสือทั้งหมด
                                                </a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report4.php">ค้นหาเลขหนังสือ
                                                    ตามชื่อเรื่อง</a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report2.php">ค้นหาเลขหนังสือ
                                                    ตามชื่อผู้ส่ง </a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report3.php">ค้นหาเลขหนังสือ
                                                    ตามชื่อผู้รับ</a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report5.php">ค้นหาเลขหนังสือ
                                                    ตามชื่อผู้ขอเลขหนังสือ</a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report6.php">ค้นหาเลขหนังสือ
                                                    ตามช่วงเวลาที่ต้องการ</a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report8.php">ค้นหาเลขหนังสือ ตามกลุ่ม</a></font></p>
                                        <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="report7.php">ตรวจสอบจำนวนเอกสาร</a></font></p>
                                    </blockquote>
                                </blockquote></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="footer">
                <div id="bottom_addr">
                    <p>พัฒนาโดยภาควิชาวิศวกรรมเครื่องกล</p>
                    <p>คณะวิศวกรรมศาสตร์ มหาวิทยาลัยสงขลานครินทร์</p>
                </div>
            </div>
        </div>

    </body>
</html>
