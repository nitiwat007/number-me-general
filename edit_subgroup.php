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
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>

        <?	
        include("A_connect.inc");

        $ID_TypeSubFloder1 		= $_GET["ID_TypeSubFloder"];

        $query1					= "select * from typesubfloder  where ID_TypeSubFloder  like '$ID_TypeSubFloder1'";
        mysql_select_db('numberme',$connect);
        $result 				= mysql_query($query1, $connect);

        $result					=mysql_fetch_array($result);
        $ID_TypeSubFloder		=$result['ID_TypeSubFloder'];
        $ID_TypeFloder			=$result['ID_TypeFloder'];
        $Name_TypeSubFloder		=$result['Name_TypeSubFloder'];


        ?>

        <table width="502" border="0" cellpadding="0" cellspacing="0" style="border-right:1px solid black; border-left:1px solid black; border-top:1px solid black; border-bottom:1px solid black;">
            <!--DWLayoutTable-->
            <form  name="form" method="post" action="datasubgroup.php">
                <tr> 
                    <td width="1" height="25">&nbsp;</td>
                    <td colspan="3" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><strong>แก้ไขข้อมูลรายละเอียด</strong></font></div></td>
                    <td width="13">&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียด
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <input name="Name_TypeSubFloder" type="text" id="Name_TypeSubFloder" size="50" value="<? echo $Name_TypeSubFloder;?>">
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="62">&nbsp;</td>
                    <td valign="bottom"><div align="right"> 
                            <input type="hidden" name="ID_TypeSubFloder" value="<? echo $ID_TypeSubFloder;?>" />
                            <input type="hidden" name="ID_TypeFloder" value="<? echo $ID_TypeFloder;?>" />
                            <input type="hidden" name="action" value="edit" />
                            <input type="submit" name="Submit" value="ตกลง">
                        </div></td>
                    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="bottom"><input type="reset" name="Submit2" value="ยกเลิก"></td>
                    <td>&nbsp;</td>
                </tr>
            </form>
            <tr> 
                <td height="0"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </body>
</html>
