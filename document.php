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
                            <tr>
                                <td colspan="2"><h4>จัดการเอกสาร</h4></td>
                            </tr>
                            <tr>
                                <td>

                                    <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="managedocument.php">อับโหลดไฟล์
                                            แก้ไขข้อมูลเอกสาร </a></font>
                                </td>
                                <td>
                                    <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><a href="group.php">จัดการกลุ่มเอกสาร
                                            (สำหรับเจ้าหน้าที่)</a></font>
                                </td>
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
