<?php
session_start();
require_once('lib/check.inc.php');
include("A_connect.inc");
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
//echo $ID_Member;




//if (($ID_Member != '00165508') && ($ID_Member != '0029222')) {
if(!$hasRole){
    echo "Sorry. You don't have permission.<br>";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
} else {
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
                                <tr valign="middle">
                                    <td height="26" colspan="4"><div align="right"><a href="add_group.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เพิ่มกลุ่มเอกสารใหม่</font></a></div></td>
                                </tr>
                                <tr>
                                    <td height="26" colspan="4" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายชื่อกลุ่มเอกสารทั้งหมด</font></strong></div></td>
                                </tr>
                                <tr>
                                    <td width="60" height="26" valign="middle" bgcolor="#99CCFF"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                                    <td width="655" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกลุ่มเอกสาร</font></td>
                                    <td width="60" valign="middle" bgcolor="#99CCFF"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">แก้ไข</font></div></td>
                                    <td width="60" valign="middle" bgcolor="#99CCFF"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลบ</font></div></td>
                                </tr>
                                <?
                                $sql				= "select * from typefloder order by CONVERT (Name_TypeFloder USING tis620)";
                                mysql_select_db('numberme',$connect);
                                $query2			= mysql_query($sql, $connect);

                                $num_rows = mysql_num_rows($query2);
                                $num_fields=mysql_num_fields($query2);

                                $i=0;

                                while($i<$num_rows)	{
                                $result				=mysql_fetch_array($query2);
                                $ID_TypeFloder		=$result['ID_TypeFloder'];
                                $Name_TypeFloder	=$result['Name_TypeFloder'];


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
                                    <!-- <td valign="middle" bgcolor="<?= $bg ?>"><a href="subgroup.php?ID_TypeFloder=<? echo $ID_TypeFloder;?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_TypeFloder;?></font></a></td> -->
                                    <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_TypeFloder;?></font></td>
                                    <td align="center" valign="middle" bgcolor="<?= $bg ?>"><a href="edit_group.php?ID_TypeFloder=<? echo $ID_TypeFloder;?>"><img src="animation/fileman/ed_html.gif" width="20" height="20"></a></td>
                                    <td align="center" valign="middle" bgcolor="<?= $bg ?>"><a href="del_group.php?ID_TypeFloder=<? echo $ID_TypeFloder;?>"><img src="animation/fileman/del.gif" width="20" height="20"></a></td>
                                </tr>
                                <?
                                $i++;
                                }
                                ?>
                                <tr valign="middle">
                                    <td height="26" colspan="4"><div align="right"><a href="add_group.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เพิ่มกลุ่มเอกสารใหม่</font></a></div></td>
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
<?
}
?>
