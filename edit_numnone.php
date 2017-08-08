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

        $numb		 		= $_GET["ID_NoneNum"];

        $query1				= "select * from nonenum where ID_NoneNum = '$numb' and Sen_NoneNum = '$ID_Member'";
        mysql_select_db('numberme',$connect);
        $result 			= mysql_query($query1, $connect);

        $result				=mysql_fetch_array($result);
        $ID_NoneNum			=$result['ID_NoneNum'];
        $Num_NoneNum		=$result['Num_NoneNum'];
        $To_NoneNum			=$result['To_NoneNum'];
        $Sub_NoneNum		=$result['Sub_NoneNum'];
        $From_NoneNum		=$result['From_NoneNum'];
        $DateOn_NoneNum		=$result['DateOn_NoneNum'];

        $d		= substr($DateOn_NoneNum,8,2);
        $m		= substr($DateOn_NoneNum,5,2);
        $y		= substr($DateOn_NoneNum,0,4)+543;
        $DateOn_NoneNum1 	= $d."-".$m."-".$y;

        ?>

        <table width="502" border="0" cellpadding="0" cellspacing="0" style="border-right:1px solid black; border-left:1px solid black; border-top:1px solid black; border-bottom:1px solid black;">
            <!--DWLayoutTable-->
            <form  name="form" method="post" action="datanonenumber.php">
                <tr> 
                    <td width="1" height="25">&nbsp;</td>
                    <td colspan="3" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><strong>แก้ไขข้อมูลเอกสาร</strong></font></div></td>
                    <td width="13">&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่ในหนังสือ
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <input name="DateOn_NoneNum" type="text" id="DateOn_NoneNum" size="20" value="<? echo $DateOn_NoneNum1;?>">
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขที่หนังสือ
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <input name="Num_NoneNum" type="text" id="Num_NoneNum" size="50" value="<? echo $Num_NoneNum;?>">
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง 
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <textarea name="Sub_NoneNum" cols="35"><? echo $Sub_NoneNum;?></textarea>
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน 
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <input name="To_NoneNum" type="text" id="To_NoneNum" size="50" value="<? echo $To_NoneNum;?>">
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="25">&nbsp;</td>
                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จาก 
                                <font color="#FF0000">*</font> </font></div></td>
                    <td width="9" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">:</font></div></td>
                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"> 
                            <input name="From_NoneNum" type="text" id="From_NoneNum" size="50" value="<? echo $From_NoneNum;?>">
                        </font></td>
                    <td>&nbsp;</td>
                </tr>
                <tr> 
                    <td height="62">&nbsp;</td>
                    <td valign="bottom"><div align="right"> 
                            <input type="hidden" name="ID_NoneNum" value="<? echo $ID_NoneNum;?>" />
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
