<?php
session_start();
require_once('lib/check.inc.php');
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
//echo $Name_Member;
include("A_connect.inc");

$ID_NumControl = isset($_GET['ID_NumControl']) ? $_GET['ID_NumControl'] : 1;
$Num_NumControl = isset($_GET['Num_NumControl']) ? $_GET['Num_NumControl'] : 1;
$ID_NoneNum = isset($_GET['ID_NoneNum']) ? $_GET['ID_NoneNum'] : 1;
$Num_NoneNum = isset($_GET['Num_NoneNum']) ? $_GET['Num_NoneNum'] : 1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
        <?
        echo "<p>Max upload filesize=32M</p>";
        if ($ID_NumControl || $Num_NumControl){
        ?>

        <table width="339" border="0" cellpadding="0" cellspacing="0" style="border-right:1px solid black; border-left:1px solid black; border-top:1px solid black; border-bottom:1px solid black;">
            <!--DWLayoutTable-->
            <tr>
                <td width="334" height="77" valign="middle"> <form action="datanumber.php" method=post enctype="multipart/form-data">
                        <div align="center">File:
                            <input type=file name="userfile">
                            <br>
                            <input type="hidden" name="Num_NumControl" value="<? echo $Num_NumControl;?>" />
                            <input type="hidden" name="ID_NumControl" value="<? echo $ID_NumControl;?>" />
                            <input type="hidden" name="action" value="upload" />
                            <input type="submit" name="submit" value="ตกลง">
                        </div>
                    </form></td>
                <td width="3">&nbsp;</td>
            </tr>
        </table>
        <?
        }
        if ($ID_NoneNum || $Num_NoneNum){
        ?>
        <table width="339" border="0" cellpadding="0" cellspacing="0" style="border-right:1px solid black; border-left:1px solid black; border-top:1px solid black; border-bottom:1px solid black;">
            <!--DWLayoutTable-->
            <tr>
                <td width="334" height="77" valign="middle"> <form action="datanonenumber.php" method=post enctype="multipart/form-data">
                        <div align="center">File:
                            <input type=file name="userfile">
                            <br>
                            <input type="hidden" name="Num_NoneNum" value="<? echo $Num_NoneNum;?>" />
                            <input type="hidden" name="ID_NoneNum" value="<? echo $ID_NoneNum;?>" />
                            <input type="hidden" name="action" value="upload" />
                            <input type="submit" name="submit" value="ตกลง">
                        </div>
                    </form></td>
                <td width="3">&nbsp;</td>
            </tr>
        </table>
        <?
        }
        ?>
    </body>
</html>
