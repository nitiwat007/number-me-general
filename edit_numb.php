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
        <!-- bootstrap3 -->
        <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="css/navbar.css" rel="stylesheet">
        <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
        <!-- bootstrap3 -->
        <!-- <script src="js/myjs/main.js"></script> -->
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
        <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="js/myjs/personel.js"></script>
    </head>

    <body>
      <div class="container">
          <?php require('UserControl/topMenu.php'); ?>
        <?
        include("A_connect.inc");

        $numb		 		= $_GET["ID_NumControl"];

        $query1				= "select * from numcontrol where ID_NumControl = '$numb' and Sen_NumControl = '$ID_Member'";
        //echo $query1;
        mysql_select_db('numberme',$connect);
        $result 			= mysql_query($query1, $connect);

        $result				=mysql_fetch_array($result);
        $ID_TypeDoc      =$result['ID_TypeDoc'];
        $ID_TypeFloder      =$result['ID_TypeFloder'];
        $ID_NumControl		=$result['ID_NumControl'];
        $Num_NumControl		=$result['Num_NumControl'];
        $From_NumControl	=$result['From_NumControl'];
        $To_NumControl		=$result['To_NumControl'];
        $Sub_NumControl		=$result['Sub_NumControl'];
        $File_NumControl	=$result['File_NumControl'];
        $Date_NumControl	=$result['Date_NumControl'];
        $Sen_NumControl		=$result['Sen_NumControl'];
        $user_request_name=$result['user_request_name'];
        $user_request_section=$result['user_request_section'];
        //echo "ID_TypeDoc= ".$ID_TypeDoc;

        $day				= substr($Date_NumControl,8,2);
        $month			= substr($Date_NumControl,5,2);
        $year			= substr($Date_NumControl,0,4);

        $year1	= $year+543;
        ?>

        <table class="table table-bordered">
            <!--DWLayoutTable-->
            <form  name="form" method="post" action="datanumber.php">
                <tr>

                    <td colspan="3" valign="top"><div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><strong>แก้ไขข้อมูลเอกสาร</strong></font></div></td>

                </tr>
                <tr valign="middle">
                    <td height="30" valign="middle"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่(dd-mm-yyyy)</font></div></td>
                    <td><input class="form-control" name="Date_NumControl" type="text" id="Date_NumControl" value="<? echo $day."-".$month."-".$year1 ?>"></td>
                </tr>
                <tr>
                  <tr valign="middle">
                      <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ประเภทเอกสาร</font></div></td>

                      <td valign="top"> <select class="form-control" id="ID_TypeFloder" name="ID_TypeFloder" onChange = "ListMM(this.value)">
                              <option value="0" selected>-- กรุณาระบุกลุ่มเอกสาร --</option>
                              <?
                              //echo "ID_TypeDoc= ".$ID_TypeDoc;
                              $strSQL = "SELECT * FROM typefloder ORDER BY CONVERT (Name_TypeFloder USING tis620)";
                              $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                              while($objResult = mysql_fetch_array($objQuery))
                              {
                                if($ID_TypeFloder==$objResult["ID_TypeFloder"]){
                              ?>
                              <option value="<?= $objResult["ID_TypeFloder"]; ?>" selected>
                                  <?= $objResult["Name_TypeFloder"]; ?>
                              </option>
                              <?
                            }else{
                              ?>
                              <option value="<?= $objResult["ID_TypeFloder"]; ?>">
                                  <?= $objResult["Name_TypeFloder"]; ?>
                              </option>
                              <?
                            }
                              }
                              ?>
                          </select> </td>
                  </tr>
                </tr>
                <tr>

                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง
                                <font color="#FF0000">*</font> </font></div></td>

                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                            <textarea class="form-control" name="Sub_NumControl" cols="35"><? echo $Sub_NumControl;?></textarea>
                        </font></td>

                </tr>
                <tr>

                    <td width="126" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรียน
                                <font color="#FF0000">*</font> </font></div></td>

                    <td width="353" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                            <input class="form-control" name="To_NumControl" type="text" id="To_NumControl" size="50" value="<? echo $To_NumControl;?>">
                        </font></td>

                </tr>
                <tr valign="middle">
                    <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้ขอออกเลข</font></div></td>
                    <td>
                      <div class="widget-content2">
                          <input class="form-control" type="text" id="fullname_request" class="" name="fullname_request" value="<? echo $user_request_name;?>" placeholder="Full Name" >
                          <input type="hidden" id="user_request_name" class="form-control" name="user_request_name" value="<? echo $user_request_name;?>">
                      </div>
                    </td>
                </tr>
                <tr valign="middle">
                    <td height="30" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หน่วยงานผู้ขอออกเลข</font></div></td>
                    <td>
                      <div class="widget-content3">
                          <input class="form-control" type="text" id="user_section" class="" name="user_section" value="<?=$user_request_section;?>" placeholder="Section" >
                          <input type="hidden" id="user_section_value" class="form-control" name="user_section_value" value="<?=$user_request_section;?>">
                      </div>
                    </td>
                </tr>
                <tr>

                    <td valign="bottom" colspan="2"><div align="center">
                            <input type="hidden" name="Num_NumControl" value="<? echo $Num_NumControl;?>" />
                            <input type="hidden" name="ID_NumControl" value="<? echo $ID_NumControl;?>" />
                            <input type="hidden" name="action" value="edit" />
                            <input type="submit" class="btn btn-success" name="submit" value="ตกลง">
                            <input type="reset" class="btn btn-danger" name="Submit2" value="ยกเลิก">
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
