<?php
session_start();
require_once('lib/check.inc.php');
include('function/numberme.php');
include("connect/conn_db_oracle.php");
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
        <script src="js/myjs/report6.js"></script>
    </head>
    <body>
      <div class="container">
        <div id="page">
            <?php require('UserControl/topMenu.php'); ?>
            <div id="body_area">
                <div>
                    <table id="form" class="table table-bordered">

                        <form  name="form" method="post">
                            <tr>
                                <td height="26" colspan="6" valign="top"><div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        </font>
                                            <?
                                            $query			= "select * from typedoc";
                                            mysql_select_db('numberme',$connect);
                                            $result 			= mysql_query($query, $connect);
                                            if(!$result)	{
                                            exit;
                                            }
                                            ?>
                                            <div class="col-md-2 col-md-offset-2 text-right">กรุณาเลือก : </div>
                                            <div class="col-md-4">
                                            <select class="form-control" name="typedoc">
                                                <option value=" " selected>:: ประเภทหนังสือ ::</option>
                                                <?
                                                while ($object = mysql_fetch_object($result))	{
                                                ?>
                                                <option value=<? echo $object->ID_TypeDoc;?>>
                                                        <? echo $object->Name_TypeDoc;?>
                                            </option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" name="date1" type="text" id="date1"  placeholder="วันเริ่มต้น dd-mm-yyy">
                                      </div>
                                    <div class="col-md-2">
                                        <input class="form-control" name="date2" type="text" id="date2" placeholder="วันสิ้นสุด dd-mm-yyy">
                                      </div>
                                    </div></td>
                        </tr>
                        <tr>
                            <td height="26" colspan="6" valign="top"><div align="right"><strong>
                                        <input class="btn btn-success" type="submit" name="Submit" value="ตกลง">
                                        <input id="btnprint" class="btn btn-info" type="button" name="print" value="พิมพ์">
                                    </strong></div></td>
                        </tr>
                    </form>
                  </table>
                    <table id="report6" class="table table-bordered">
                    <?
                    if(isset($_POST['Submit'])){
                    $Submit=$_POST['Submit'];
                    $typedoc=$_POST['typedoc'];
                    //$numb=$_POST['numb'];;
                    $year=isset($_POST['year']) ? $_POST['year'] : null;
                    }else{
                    //echo "0";
                    $Submit="";
                    $typedoc="";
                    $numb="";
                    $year="";
                    }
                    if  (($Submit== "ตกลง") && ($typedoc !=" "))
                    {
                    $typedoc	 		= $_POST["typedoc"];
                    $date11	 			= $_POST["date1"];
                    $date21				= $_POST["date2"];

                    $dd1				= substr($date11,0,2);
                    $mm1				= substr($date11,3,2);
                    $yy1				= substr($date11,6,4)-543;
                    $date1 				= $yy1."-".$mm1."-".$dd1;

                    $dd2				= substr($date21,0,2);
                    $mm2				= substr($date21,3,2);
                    $yy2				= substr($date21,6,4)-543;
                    $date2 				= $yy2."-".$mm2."-".$dd2;

                    $sql1				= "select * from typedoc where ID_TypeDoc like '$typedoc'";
                    mysql_select_db('numberme',$connect);
                    $query1				= mysql_query($sql1, $connect);

                    $result				= mysql_fetch_array($query1);
                    $ID_TypeDoc			= $result['ID_TypeDoc'];
                    $ID_TypeDocValue			=$result['TypeDocValue'];
                    $Name_TypeDoc		= $result['Name_TypeDoc'];
                    $TypeDocValue		= $result['TypeDocValue'];

                    ?>
                    <tr>
                        <td height="26" colspan="6" valign="top"><div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายงานเลขหนังสือที่ต้องการ</font></strong></div></td>
                    </tr>
                    <?
                    if ($ID_TypeDoc == 1 || $ID_TypeDoc ==2 || $ID_TypeDoc == 3 || $ID_TypeDoc ==4){
                    ?>
                    <tr>
                        <td height="26" valign="middle" bgcolor="#99CCFF">
                            <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div>
                        </td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                    </tr>
                    <?



                    $sql				= "select * from numcontrol where ID_TypeDoc = '$typedoc' and Date_NumControl between '$date1' and '$date2' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                    while($i<$num_rows)	{
                    $result				=mysql_fetch_array($query2);
                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $status		=$result['status'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
                    $Year_NumControl	=$result['Year_NumControl']+543;
                    $user_request_name=$result['user_request_name'];
                    $user_request_section=$result['user_request_section'];


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
                          if ($ID_TypeDoc == 1 || $ID_TypeDoc == 2 || $ID_TypeDoc == 3){
                            if($status==0){
                              echo $ID_TypeDocValue."/".$Num_NumControl;
                            }else{
                            echo $ID_TypeDocValue."/ ว ".$Num_NumControl;
                            }
                          }
                          if ($ID_TypeDoc == 4 || $ID_TypeDoc == 5 || $ID_TypeDoc == 6 || $ID_TypeDoc == 7){
                          echo $ID_TypeDocValue." ที่ ".$Num_NumControl."/".$Year_NumControl;
                          }
                          ?>
                            </font></td>
                        <?
                        $d		= substr($Date_NumControl,8,2);
                        $m		= substr($Date_NumControl,5,2);
                        $y		= substr($Date_NumControl,0,4)+543;
                        ?>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl); //$d."-".$m."-".$y;?>
                            </font></td>
                            <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                    <!-- <font color="#009999">จาก
                                        <? echo $From_NumControl;?>
                                    </font>
                                    <br> -->
                                    <font color="#993366">ถึง
                                        <? echo $To_NumControl;?>
                                    </font>
                                    <br>
                                      <font color="#0000FF">ผู้ขอออกเลข
                                        <? echo $user_request_name;?>
                                      </font>
                                    <br>
                                      <font color="#0000FF">หน่วยงาน
                                        <? echo $user_request_section;?>
                                      </font>
                                    <br>
                                    <font color="#0000FF">ผู้บันทึก
                                        <?
                                        $query_oracle = "SELECT * from p_staff WHERE staff_id='$Sen_NumControl'";
                                        $parse_oracle = oci_parse($connect_oracle, $query_oracle);
                                        oci_execute($parse_oracle,OCI_DEFAULT);
                                        $result_oracle = oci_fetch_array($parse_oracle,OCI_BOTH);
                                        $Name_Member_Sen	= $result_oracle['STAFF_NAME_THAI']." ".$result_oracle['STAFF_SNAME_THAI'];
                                        echo $Name_Member_Sen;

                                        ?>
                                    </font>
                                   </font>
                            </td>
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
                    if ($ID_TypeDoc == 5){
                    ?>
                    <tr>
                        <td height="26" valign="middle" bgcolor="#99CCFF"> <div align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อหนังสือ</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ลงวันที่</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดผู้ส่ง</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font></td>
                        <td valign="middle" bgcolor="#99CCFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ไฟล์แนบ</font></td>
                    </tr>
                    <?
                    $sql				= "select * from nonenum where ID_TypeDoc = '$typedoc' and DateOn_NoneNum between '$date1' and '$date2' order by CONVERT (Num_NoneNum USING tis620)";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                    while($i<$num_rows)	{
                    $result				=mysql_fetch_array($query2);
                    $Num_NoneNum		=$result['Num_NoneNum'];
                    $From_NoneNum		=$result['From_NoneNum'];
                    $To_NoneNum			=$result['To_NoneNum'];
                    $Sub_NoneNum		=$result['Sub_NoneNum'];
                    $File_NoneNum		=$result['File_NoneNum'];
                    $DateOn_NoneNum		=$result['DateOn_NoneNum'];
                    $Sen_NoneNum		=$result['Sen_NoneNum'];
                    $Year_NoneNum		=$result['Year_NoneNum']+543;


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
                                echo " เลขที่ ".$Num_NoneNum;
                                ?>
                            </font></td>
                        <?
                        $d		= substr($DateOn_NoneNum,8,2);
                        $m		= substr($DateOn_NoneNum,5,2);
                        $y		= substr($DateOn_NoneNum,0,4)+543;
                        ?>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $d."-".$m."-".$y;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <font color="#009999">จาก
                                    <? echo $From_NoneNum;?></font>
                                <br>
                                <font color="#993366">ถึง
                                    <? echo $To_NoneNum;?></font>
                                <br>
                                <font color="#0000FF">ผู้ขอเลข/ผู้บันทึก
                                    <?
                                    $query				= "select * from member_detail where ID_Member = '$Sen_NoneNum'";
                                    mysql_select_db('numberme',$connect);
                                    $result 			= mysql_query($query, $connect);

                                    $result1			= mysql_fetch_array($result);
                                    $Name_Member_Sen	= $result1['Name_Member'];

                                    echo $Name_Member_Sen;?></font>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NoneNum;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?
                                if ($File_NoneNum != "-"){
                                ?>
                                <a href="<? echo "./uploadnone/$File_NoneNum";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else {
                                echo $File_NoneNum;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
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
