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
        <?
        include("A_connect.inc");
        //$objConnect = mysql_connect("localhost","root","nitiwat") or die("Error Connect to Database");
        $objDB = mysql_select_db('numberme',$connect);
        ?>
        <script language="javascript">
            //-->

            //**** List DetailProduct (Start) ***//
            function ListMM(SelectValue)
            {
            //frmMain.ddlProduct.length = 0
            frmMain.ddlMM.length = 0

                    //*** Insert null Default Value ***//
                    var myOption = new Option('', '')
                    frmMain.ddlMM.options[frmMain.ddlMM.length] = myOption

                    < ?
                    $intRows = 0;
            $strSQL = "SELECT * FROM typesubfloder ORDER BY CONVERT (Name_TypeSubFloder USING tis620) ";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            $intRows = 0;
            while ($objResult = mysql_fetch_array($objQuery))
            {
            $intRows++;
            ? >
                    x = <?= $intRows; ?>;
            mySubList = new Array();
            strGroup = <?= $objResult["ID_TypeFloder"]; ?>;
            strValue = <?= $objResult["ID_TypeSubFloder"]; ?>;
            strItem = '<?= $objResult["Name_TypeSubFloder"]; ?>';
            mySubList[x, 0] = strItem;
            mySubList[x, 1] = strGroup;
            mySubList[x, 2] = strValue;
            if (mySubList[x, 1] == SelectValue){
            var myOption = new Option(mySubList[x, 0], mySubList[x, 2])
                    frmMain.ddlMM.options[frmMain.ddlMM.length] = myOption
            }
                    <?
            }
            ?>
            }
            //**** List Province (End) ***//
            
            
            </script>
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

                    $ID_TypeDoc1 		= $_GET["ID_TypeDoc"];
                    $Num_NumControl_ 	= $_GET["Num_NumControl"];
                    $Date_NumControl 	= $_GET["Date_NumControl"];

                    $sql				= "select * from typedoc where ID_TypeDoc like '$ID_TypeDoc1'";
                    mysql_select_db('numberme',$connect);
                    $query				= mysql_query($sql ,$connect);

                    $result				= mysql_fetch_array($query);
                    $ID_TypeDoc			= $result['ID_TypeDoc'];
                    $Name_TypeDoc		= $result['Name_TypeDoc'];
                    $y 					= date("Y");

                    $dd					= substr($Date_NumControl,8,2);
                    $mm					= substr($Date_NumControl,5,2);
                    $yy					= substr($Date_NumControl,0,4)+543;
                    $Date_NumControl	= $dd."-".$mm."-".$yy;

                    ?>
                </table>
            </div>
            <div id="body_area">
                <div style="border:#5b7c01 solid 1px;padding:4px 6px 2px 6px">
                    <form  name="frmMain" method="post" action="datanumber.php">
                        <table width="835" border="0" cellpadding="0" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr valign="middle">
                                <td width="200" height="30"></td>
                                <td width="30"></td>
                                <td width="605"></td>
                            </tr>
                            <tr>
                                <td height="30" colspan="3" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกเลขที่หนังสือ
                                                <? echo $Name_TypeDoc;?>
                                            </font></strong></div></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="middle"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Date_NumControl;?></font></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">กรุณาเลือกกลุ่มเอกสาร</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="top"> <select id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
                                        <option selected value=""></option>
                                        <?
                                        $strSQL = "SELECT * FROM typefloder ORDER BY CONVERT (Name_TypeFloder USING tis620)";
                                        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                                        while($objResult = mysql_fetch_array($objQuery))
                                        {
                                        ?>
                                        <option value="<?= $objResult["ID_TypeFloder"]; ?>">
                                            <?= $objResult["Name_TypeFloder"]; ?>
                                        </option>
                                        <?
                                        }
                                        ?>
                                    </select> </td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">กรุณาเลือกกลุ่มย่อย</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="top"> <select id="ddlMM" name="ddlMM">
                                    </select> </td>
                            </tr>
                            <tr valign="middle">
                                <td height="70" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="top"><textarea name="Sub_NumControl" cols="30" id="Sub_NumControl"></textarea></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="top"><input name="To_NumControl" type="text" id="To_NumControl" size="40"></td>
                            </tr>

                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จาก</font></div></td>
                                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td valign="top">
                                    <?
                                    $query			= "select * from member_detail where status = 1 order by convert (Name_Member using tis620)";
                                    mysql_select_db('numberme',$connect);
                                    $result 		= mysql_query($query, $connect);
                                    if(!$result)	{
                                    exit;
                                    }
                                    ?>
                                    <select name="ID_Member_From">
                                        <option value=" " selected>:: รายชื่อบุคลากร ::</option>
                                        <?
                                        while ($object = mysql_fetch_object($result))	{
                                        ?>
                                        <option value=<? echo $object->ID_Member;?>>
                                                <? echo $object->Name_Member;?>
                                    </option>
                                    <?
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้ขอเลขหนังสือ</font></div></td>
                            <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                            <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_Member;?></font></td>
                        </tr>
                        <tr valign="bottom">
                            <td height="39" colspan="3"><div align="center">
                                    <input type="hidden" name="Num_NumControl" value="<? echo $Num_NumControl;?>" />
                                    <input type="hidden" name="ID_TypeDoc" value="<? echo $ID_TypeDoc;?>" />
                                    <input type="hidden" name="Date_NumControl" value="<? echo $Date_NumControl;?>" />
                                    <input type="hidden" name="action" value="addback" />
                                    <input type="submit" name="Submit" value="ตกลง">
                                    &nbsp;
                                    <input type="reset" name="Submit2" value="ยกเลิก">
                                </div></td>
                        </tr>
                        <tr valign="middle">
                            <td height="18"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
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
