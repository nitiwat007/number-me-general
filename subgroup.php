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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>ระบบออกเลขหนังสือราชการ ภาควิชาวิศวกรรมเครื่องกล</title>
        <meta name="description" content="cycling sport website">
        <meta name="keywords" content="cycling sport">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="page">
            <div id="menu"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="item"><a href="main.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หน้าหลัก</font></a></td>
                        <td class="item"><a href="document.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จัดการเอกสาร</font></a></td>
                        <td class="item"><a href="new.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกเลข (ปกติ)</font></a></td>
                        <td class="item"><a href="back.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกเลข (ย้อนหลัง)</font></a></td>
                        <td class="item"><a href="report.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายงาน</font></a></td>
                        <td class="item"><a href="logout.php"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกจากระบบ</font></a></td>
                    </tr>
                    <?	
                    include("A_connect.inc");

                    $ID_TypeFloder1 			= $_GET["ID_TypeFloder"];
                    ?>
                </table>
            </div>
            <div id="body_area">
                <div style="border:#5b7c01 solid 1px;padding:4px 6px 2px 6px">
                    <table width="835" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->
                        <tr valign="middle"> 
                            <td height="26" colspan="5"><div align="right"><a href="add_subgroup.php?ID_TypeFloder=<? echo $ID_TypeFloder1;?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เพิ่มกลุ่มย่อยเอกสารใหม่</font></a></div></td>
                        </tr>
                        <tr> 
                            <td height="26" colspan="5" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายชื่อกลุ่มย่อยเอกสาร</font></strong></div></td>
                        </tr>
                        <tr> 
                            <td width="60" height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                            <td width="250" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกลุ่มเอกสาร</font></td>
                            <td width="405" valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียด</font></td>
                            <td width="60" valign="middle" bgcolor="#99CCFF"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">แก้ไข</font></div></td>
                            <td width="60" valign="middle" bgcolor="#99CCFF"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลบ</font></div></td>
                        </tr>
                        <? 
                        $sql				= "select * from typesubfloder where ID_TypeFloder like '$ID_TypeFloder1' order by CONVERT (Name_TypeSubFloder USING tis620)";
                        mysql_select_db('numberme',$connect);
                        $query2			= mysql_query($sql, $connect);

                        $num_rows 		= mysql_num_rows($query2);
                        $num_fields		= mysql_num_fields($query2);

                        $i=0;

                        while($i<$num_rows)	{
                        $result				=mysql_fetch_array($query2);
                        $ID_TypeSubFloder	=$result['ID_TypeSubFloder'];
                        $ID_TypeFloder		=$result['ID_TypeFloder'];
                        $Name_TypeSubFloder	=$result['Name_TypeSubFloder'];


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
                            <? 
                            $sql_				= "select * from typefloder where ID_TypeFloder like '$ID_TypeFloder'";
                            mysql_select_db('numberme',$connect);
                            $query2_			= mysql_query($sql_, $connect);

                            $result				=mysql_fetch_array($query2_);
                            //$ID_TypeFloder		=$result[ID_TypeFloder];
                            $Name_TypeFloder	=$result['Name_TypeFloder'];
                            ?>	  
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_TypeFloder;?></font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_TypeSubFloder;?></font></td>
                            <td align="center" valign="middle" bgcolor="<?= $bg ?>"><a href="edit_subgroup.php?ID_TypeSubFloder=<? echo $ID_TypeSubFloder; ?>"><img src="animation/fileman/ed_html.gif" width="20" height="20"></a></td>
                            <td align="center" valign="middle" bgcolor="<?= $bg ?>"><a href="del_subgroup.php?ID_TypeSubFloder=<? echo $ID_TypeSubFloder; ?>"><img src="animation/fileman/del.gif" width="20" height="20"></a></td>
                        </tr>
                        <? 
                        $i++;
                        }
                        ?>
                        <tr valign="bottom"> 
                            <td height="26" colspan="5"><div align="right"><a href="add_subgroup.php?ID_TypeFloder=<? echo $ID_TypeFloder1;?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เพิ่มกลุ่มย่อยเอกสารใหม่</font></a></div></td>
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
