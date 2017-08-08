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
        <title>ระบบออกเลขหนังสือราชการ วิทยาเขตภูเก็ต</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <?php require('UserControl/topMenu.php'); ?>
        <?


        $ID_TypeFloder 		= $_GET["ID_TypeFloder"];

        $query1				= "select * from typefloder  where ID_TypeFloder  like '$ID_TypeFloder'";
        mysql_select_db('numberme',$connect);
        $result 			= mysql_query($query1, $connect);

        $result				=mysql_fetch_array($result);
        $ID_TypeFloder		=$result['ID_TypeFloder'];
        $Name_TypeFloder	=$result['Name_TypeFloder'];


        ?>

        <table class="table table-bordered">
            <!--DWLayoutTable-->
            <form  name="form" method="post" action="datagroup.php">
                <tr>

                    <td colspan="3" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><strong>แก้ไขข้อมูลกลุ่มเอกสาร</strong></font></div></td>

                </tr>
                <tr>

                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกลุ่มเอกสาร
                                <font color="#FF0000">*</font> </font></div></td>

                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                            <input class="form-control" name="Name_TypeFloder" type="text" id="Name_TypeFloder" size="50" value="<? echo $Name_TypeFloder;?>">
                        </font></td>

                </tr>
                <tr>

                    <td colspan="3" valign="bottom"><div align="right">
                            <input type="hidden" name="ID_TypeFloder" value="<? echo $ID_TypeFloder;?>" />
                            <input type="hidden" name="action" value="editgroup" />
                            <input class="btn btn-success" type="submit" name="Submit" value="ตกลง">
                            <input class="btn btn-danger" type="reset" name="Submit2" value="ยกเลิก">
                        </div></td>



                </tr>
            </form>

        </table>
        <div id="footer">
            <?php require('UserControl/footer.php'); ?>
        </div>
      </div>
    </body>
</html>
