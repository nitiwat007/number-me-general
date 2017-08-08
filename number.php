<?php
session_start();
require_once('lib/check.inc.php');
include("A_connect.inc");
include("function/numberme.php");
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


        <!-- <link rel="stylesheet" href="css/bulma-0.4.0/css/bulma.css"> -->

        <!-- bootstrap3 -->
        <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="css/navbar.css" rel="stylesheet">
        <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
        <!-- bootstrap3 -->
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
        <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="js/myjs/personel.js"></script>
        <?
        include("A_connect.inc");
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

            <?


            $ID_TypeDoc1 		= $_GET["ID_TypeDoc"];

            $sql				= "select * from typedoc where ID_TypeDoc like '$ID_TypeDoc1'";
            mysql_select_db('numberme',$connect);
            $query				= mysql_query($sql ,$connect);

            $result				= mysql_fetch_array($query);
            $ID_TypeDoc			= $result['ID_TypeDoc'];
            $Name_TypeDoc		= $result['Name_TypeDoc'];
            //$y 					= date("Y");
            $day	 			= date("d");
            $month	 			= date("m");
            $year	 			= date("Y")+543;

            $year_en= date("Y");


            ?>
            <div id="body_area">
                <div>
                    <?
                    if ($ID_TypeDoc == 1 || $ID_TypeDoc ==2 || $ID_TypeDoc ==3){
                    ?>
                    <form  name="frmMain" method="post" action="datanumber.php">
                        <table class="table table-bordered">

                            <tr class="active">
                                <td height="30" colspan="2" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกเลขที่หนังสือ
                                                <? echo $Name_TypeDoc;?>
                                            </font></strong></div></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="middle"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่(dd-mm-yyyy)</font></div></td>
                                <td><input class="form-control" name="Date_NumControl" type="text" id="Date_NumControl" value="<? echo $day."-".$month."-".$year ?>"></td>
                                <!-- <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo DateThai($day."-".$month."-".$year_en);?></font></td> -->
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ประเภทเอกสาร</font></div></td>

                                <td valign="top"> <select class="form-control" id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
                                        <option value="" selected>-- กรุณาระบุประเภทเอกสาร --</option>
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
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หนังสือเวียน</font></div></td>
                                <td valign="top"><input class="checkbox-inline" name="circular" type="checkbox" value="1"></td>
                            </tr>

                            <tr valign="middle">
                                <td height="70" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></div></td>

                                <td valign="top"><textarea class="form-control" name="Sub_NumControl" cols="30" id="Sub_NumControl"></textarea></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน</font></div></td>

                                <td valign="top"><input class="form-control" name="To_NumControl" type="text" id="To_NumControl" size="40"></td>
                            </tr>


                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้ขอออกเลข</font></div></td>
                                <td>
                                  <div class="widget-content2">
                                      <input class="form-control" type="text" id="fullname_request" class="" name="fullname_request" placeholder="Full Name" >
                                      <input type="hidden" id="user_request_name" class="form-control" name="user_request_name" value="">
                                  </div>
                                </td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หน่วยงานผู้ขอออกเลข</font></div></td>
                                <td>
                                  <div class="widget-content3">
                                      <input class="form-control" type="text" id="user_section" class="" name="user_section" placeholder="Section" >
                                      <input type="hidden" id="user_section_value" class="form-control" name="user_section_value" value="">
                                  </div>
                                </td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้ออกเลขหนังสือ</font></div></td>

                                <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_Member;?></font></td>
                            </tr>
                            <tr valign="bottom">
                                <td height="39" colspan="2"><div align="center">
                                        <input type="hidden" name="Num_NumControl" value="<? echo $Num_NumControl;?>" />
                                        <input type="hidden" name="ID_TypeDoc" value="<? echo $ID_TypeDoc;?>" />
                                        <input type="hidden" name="day" value="<? echo $day;?>" />
                                        <input type="hidden" name="month" value="<? echo $month;?>" />
                                        <input type="hidden" name="year" value="<? echo $year;?>" />
                                        <input type="hidden" name="action" value="add" />
                                        <input class="btn btn-success" type="submit" name="submit" value="ตกลง">
                                        <input class="btn btn-danger" type="reset" name="submit2" value="ยกเลิก">
                                    </div></td>
                            </tr>

                        </table>
                    </form>
                    <?
                    }
                    if ($ID_TypeDoc == 4 || $ID_TypeDoc == 5 || $ID_TypeDoc == 6 || $ID_TypeDoc == 7){
                    ?>
                    <form  name="frmMain" method="post" action="datanumber.php">
                        <table class="table table-bordered">

                            <tr class="active">
                                <td height="30" colspan="2" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ออกเลขที่หนังสือ
                                                <? echo $Name_TypeDoc;?>
                                            </font></strong></div></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="middle"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่(dd-mm-yyyy)</font></div></td>
                                <td><input class="form-control" name="Date_NumControl" type="text" id="Date_NumControl" value="<? echo $day."-".$month."-".$year ?>"></td>
                                <!-- <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo DateThai($day."-".$month."-".$year_en);?></font></td> -->
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ประเภทเอกสาร</font></div></td>

                                <td valign="top"> <select class="form-control" id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
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
                                <td height="70" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></div></td>

                                <td valign="top"><textarea class="form-control" name="Sub_NumControl" cols="30" id="Sub_NumControl"></textarea></td>
                            </tr>
                            <tr valign="middle">
                                <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน</font></div></td>

                                <td valign="top"><input class="form-control" name="To_NumControl" type="text" id="To_NumControl" size="40" disabled>
                                    <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">*** คำสั่ง/ประกาศ
                                        ไม่ต้องใส่ช่องนี้</font></td>
                            </tr>


                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้ขอออกเลข</font></div></td>
                            <td>
                              <div class="widget-content2">
                                  <input class="form-control" type="text" id="fullname_request" class="" name="fullname_request" placeholder="Full Name" >
                                  <input type="hidden" id="user_request_name" class="form-control" name="user_request_name" value="">
                                  <!-- <input type="hidden" id="From_NumControl" class="form-control" name="From_NumControl" value=""> -->
                              </div>
                            </td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หน่วยงานผู้ขอออกเลข</font></div></td>
                            <td>
                              <div class="widget-content3">
                                  <input class="form-control" type="text" id="user_section" class="" name="user_section" placeholder="Section" >
                                  <input type="hidden" id="user_section_value" class="form-control" name="user_section_value" value="">
                                  <!-- <input type="hidden" id="From_NumControl" class="form-control" name="From_NumControl" value=""> -->
                              </div>
                            </td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้เลขหนังสือ</font></div></td>

                            <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><? echo $Name_Member;?></font></td>
                        </tr>
                        <tr valign="bottom">
                            <td height="39" colspan="3"><div align="center">
                                    <input type="hidden" name="Num_NumControl" value="<? echo $Num_NumControl;?>" />
                                    <input type="hidden" name="ID_TypeDoc" value="<? echo $ID_TypeDoc;?>" />
                                    <input type="hidden" name="day" value="<? echo $day;?>" />
                                    <input type="hidden" name="month" value="<? echo $month;?>" />
                                    <input type="hidden" name="year" value="<? echo $year;?>" />
                                            <!-- <input type="hidden" name= "To_NumControl" value="<? //echo "-";?>" /> -->
                                    <input type="hidden" name="action" value="add" />
                                    <input class="btn btn-success" type="submit" name="submit" value="ตกลง">
                                    <input class="btn btn-danger" type="reset" name="submit2" value="ยกเลิก">
                                </div></td>
                        </tr>
                        <!-- <tr valign="middle">
                            <td height="18"></td>
                            <td></td>
                            <td></td>
                        </tr> -->
                    </table>
                </form>
                <?
                }

                if ($ID_TypeDoc == 8){
                ?>
                <form  name="frmMain" method="post" action="datanonenumber.php">
                    <table class="table table-bordered">

                        <tr class="active">
                            <td height="30" colspan="2" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                            <? echo $Name_TypeDoc;?>
                                        </font></strong></div></td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="middle"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่บันทึกเอกสาร</font></div></td>

                            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <? echo $day."-".$month."-".$year;?>
                                </font></td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ประเภทเอกสาร</font></div></td>

                            <td valign="top"> <select class="form-control" id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
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
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขหนังสือ</font></div></td>

                            <td valign="top"><input class="form-control" name="Num_NoneNum" type="text" id="Num_NoneNum" size="20"></td>
                        </tr>
                        <tr valign="middle">
                            <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่ในหนังสือ</font></div></td>

                            <td valign="top">
                              <div class="row">
                              <div class="col-md-2">
                              <select class="form-control" name="day1" id="day1">
                                    <option value=" ">:: วัน ::</option>
                                    <? for($i=1; $i<=31; $i++)
                                    {
                                    ?>
                                    <option value="<? echo $i?>">
                                        <? echo $i?>
                                    </option>
                                    <? }?>
                                </select>
                                </div>
                                <div class="col-md-2">
                                <select class="form-control" name="month1" id="month1">
                                    <option value=" ">:: เดือน ::</option>
                                    <? $month1 = array("มกราคม ","กุมภาพันธ์ ","มีนาคม ","เมษายน ","พฤษภาคม ","มิถุนายน ","กรกฎาคม ","สิงหาคม ","กันยายน ","ตุลาคม ","พฤศจิกายน ","ธันวาคม ");?>
                                    <? for($i=0; $i<sizeof($month1); $i++) {?>
                                    <option value="<? echo $i+1?>">
                                        <? echo $month1[$i]?>
                                    </option>
                                    <? }?>
                                </select>
                              </div>
                              <div class="col-md-2">
                                <select class="form-control" name="year1" id="year1">
                                    <option value=" ">:: ปี ::</option>
                                    <? for($i=0; $i<=2; $i++) {?>
                                    <option value="<? echo date("Y")-$i?>">
                                            <? echo date("Y")-$i+543?>
                                </option>
                                <? }?>
                            </select>
                          </div>
                        </div>
                          </td>
                    </tr>
                    <tr valign="middle">
                        <td height="70" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></div></td>

                        <td valign="top"><textarea class="form-control" name="Sub_NoneNum" cols="30" id="Sub_NoneNum"></textarea></td>
                    </tr>
                    <tr valign="middle">
                        <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน</font></div></td>

                        <td valign="top"><input class="form-control" name="To_NoneNum" type="text" id="To_NoneNum" size="40">
                        </td>
                    </tr>
                    <tr valign="middle">
                        <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">จาก</font></div></td>

                        <td valign="top"><input class="form-control" name="From_NoneNum" type="text" size="40"></td>
                    </tr>
                    <tr valign="middle">
                        <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้บันทึกเอกสาร</font></div></td>

                        <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Name_Member;?>
                            </font></td>
                    </tr>
                    <tr valign="bottom">
                        <td height="39" colspan="2"><div align="center">
                                <input type="hidden" name="ID_TypeDoc" value="<? echo $ID_TypeDoc;?>" />
                                <input type="hidden" name="day" value="<? echo $day;?>" />
                                <input type="hidden" name="month" value="<? echo $month;?>" />
                                <input type="hidden" name="year" value="<? echo $year;?>" />
                                <!-- <input type="hidden" name= "To_NumControl" value="<? //echo "-";?>" /> -->
                                <input type="hidden" name="action" value="add" />
                                <input class="btn btn-success" type="submit" name="submit" value="ตกลง">
                                <input class="btn btn-danger" type="reset" name="submit2" value="ยกเลิก">
                            </div></td>
                    </tr>

                </table>
            </form>
            <?
            }
            ?>
        </div>
    </div>
    <div id="footer">
        <?php require('UserControl/footer.php'); ?>
    </div>
</div>
</div>
</body>
</html>
