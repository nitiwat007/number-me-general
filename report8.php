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
        <title>ระบบออกเลขหนังสือราชการ วิทยาเขตภูเก็ต</title>
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

        <?

        //$objConnect = mysql_connect("localhost","root","nitiwat") or die("Error Connect to Database");
        $objDB = mysql_select_db('numberme',$connect);
        @mysql_query("SET CHARACTER SET utf8");
        ?>
        <script language="javascript">
//-->

        //**** List DetailProduct (Start) ***//
        function ListMM(SelectValue)
        {
            //frmMain.ddlProduct.length = 0
            frmMain.ddlMM.length = 0

            //*** Insert null Default Value ***//
           var myOption = new Option('','')
           frmMain.ddlMM.options[frmMain.ddlMM.length]= myOption

            <?
            $intRows = 0;
            $strSQL = "SELECT * FROM typesubfloder ORDER BY CONVERT (Name_TypeSubFloder USING tis620) ";
           $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
           $intRows = 0;
           while($objResult = mysql_fetch_array($objQuery))
            {
            $intRows++;
            ?>
                x = <?=$intRows;?>;
                mySubList = new Array();

                strGroup = <?=$objResult["ID_TypeFloder"];?>;
                strValue = <?=$objResult["ID_TypeSubFloder"];?>;
                strItem = '<?=$objResult["Name_TypeSubFloder"];?>';
                mySubList[x,0] = strItem;
                mySubList[x,1] = strGroup;
                mySubList[x,2] = strValue;
                if (mySubList[x,1] == SelectValue){
                    var myOption = new Option(mySubList[x,0], mySubList[x,2])
                    frmMain.ddlMM.options[frmMain.ddlMM.length]= myOption
                }
            <?
            }
            ?>
        }
       //**** List Province (End) ***//


</script>
    </head>
    <body>
      <div class="container">
        <div id="page">

            <?php require('UserControl/topMenu.php'); ?>

            <div id="body_area">
                <div>
                    <table class="table table-bordered">

                        <form  name="frmMain" method="post">
                            <tr>
                                <td height="26" colspan="6" valign="top">
                                  <div class="col-md-2 col-md-offset-2 text-right">กรุณาเลือก : </div>
                                  <div class="col-md-4">
                                            <select class="form-control" id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
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
                                            </select>
                                          </div>
                                          <div class="col-md-4">
                                            <select class="form-control" id="ddlMM" name="ddlMM">
                                            </select>
                                          </div>
                                        </div></td>
                            </tr>
                            <tr>
                                <td height="26" colspan="6" valign="top"><div align="right">
                                            <input class="btn btn-success" type="submit" name="Submit" value="ตกลง">
                                        </div></td>
                            </tr>
                        </form>
                        <?
                        if(isset($_POST['Submit'])){
                        $Submit=$_POST['Submit'];
                        $typedoc=isset($_POST['typedoc']) ? $_POST['typedoc'] : 1;
                        //$numb=$_POST['numb'];;
                        $year=isset($_POST['year']) ? $_POST['year'] : 1;
                        $ID_TypeFloder=isset($_POST['ID_TypeFloder']) ? $_POST['ID_TypeFloder'] : 1;
                        $ddlMM=isset($_POST['ddlMM']) ? $_POST['ddlMM'] : 1;
                        }else{
                        //echo "0";
                        $Submit="";
                        $typedoc="";
                        $numb="";
                        $year="";
                        }
                        if  (($Submit== "ตกลง") && ($ID_TypeFloder !=" ") && ($ddlMM !=" "))
                        {
                        $ID_TypeFloder	 	=   $_POST["ID_TypeFloder"];
                        $ddlMM	 			=   $_POST["ddlMM"];

                        //echo $ID_TypeFloder;
                        //echo $ddlMM;
                        ?>
                        <tr>
                            <td height="26" colspan="6" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายงานเลขหนังสือที่ต้องการ</font></strong></div></td>
                        </tr>
                        <tr>
                            <td height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                            <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                        </tr>
                        <?
                        $sql				= "select * from numcontrol where ID_TypeFloder = '$ID_TypeFloder' and ID_TypeSubFloder = '$ddlMM' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                        mysql_select_db('numberme',$connect);
                        $query2				= mysql_query($sql, $connect);

                        $num_rows 			= mysql_num_rows($query2);
                        $num_fields			= mysql_num_fields($query2);

                        $i=0;

                        while($i<$num_rows)	{
                        $result				=mysql_fetch_array($query2);
                        $ID_TypeDoc			=$result['ID_TypeDoc'];
                        $Num_NumControl		=$result['Num_NumControl'];
                        $From_NumControl	=$result['From_NumControl'];
                        $To_NumControl		=$result['To_NumControl'];
                        $Sub_NumControl		=$result['Sub_NumControl'];
                        $File_NumControl	=$result['File_NumControl'];
                        $Date_NumControl	=$result['Date_NumControl'];
                        $Sen_NumControl		=$result['Sen_NumControl'];
                        $Year_NumControl	=$result['Year_NumControl']+543;

                        $sql1				= "select * from typedoc where ID_TypeDoc like '$ID_TypeDoc'";
                        mysql_select_db('numberme',$connect);
                        $query1				= mysql_query($sql1, $connect);

                        $result				=mysql_fetch_array($query1);
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
                            <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $i+1;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <?
                                    if ($ID_TypeDoc == 1 || $ID_TypeDoc == 2){
                                    echo $Name_TypeDoc."/".$Num_NumControl;
                                    }
                                    if ($ID_TypeDoc == 3 || $ID_TypeDoc == 4){
                                    echo $Name_TypeDoc." ที่ ".$Num_NumControl."/".$Year_NumControl;
                                    }
                                    ?>
                                </font></td>
                            <?
                            $d		= substr($Date_NumControl,8,2);
                            $m		= substr($Date_NumControl,5,2);
                            $y		= substr($Date_NumControl,0,4)+543;
                            ?>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $d."-".$m."-".$y;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <font color="#009999">จาก
                                        <? echo $From_NumControl;?></font>
                                    <br>
                                    <font color="#993366">ถึง
                                        <? echo $To_NumControl;?></font>
                                    <br>
                                    <font color="#0000FF">ผู้ขอเลข/ผู้บันทึก
                                        <?
                                        $query				= "select * from member_detail where ID_Member = '$Sen_NumControl'";
                                        mysql_select_db('numberme',$connect);
                                        $result 			= mysql_query($query, $connect);

                                        $result1			= mysql_fetch_array($result);
                                        $Name_Member_Sen	= $result1['Name_Member'];

                                        echo $Name_Member_Sen;
                                        ?></font>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $Sub_NumControl;?>
                                </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <?
                                    if ($File_NumControl != "-"){
                                    ?>
                                    <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                    <?
                                    }
                                    else {
                                    echo $File_NumControl;
                                    }
                                    ?>
                                </font></td>
                        </tr>
                        <?
                        $i++;
                        }
                        }
                        ?>

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
