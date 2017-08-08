<?php
session_start();
require_once('lib/check.inc.php');
include("connect/conn_db_oracle.php");
include("A_connect.inc");
$ID_Member = trim($_SESSION['ID_Member']);
$Name_Member = trim($_SESSION['Name_Member']);
//echo $Name_Member;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
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
        <!-- <script src="js/myjs/main.js"></script> -->

    </head>

    <body>

        <div class="container">

            <div id="page">

                <?php require('UserControl/topMenu.php'); ?>

            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#menu1">มอ 980</a></li>
                <li><a data-toggle="tab" href="#menu2">ศธ 0521.3</a></li>
                <li><a data-toggle="tab" href="#menu3">ศธ 0521.3 (แทน)</a></li>
                <li><a data-toggle="tab" href="#menu4">คำสั่ง</a></li>
                <li><a data-toggle="tab" href="#menu5">คำสั่ง (แทน)</a></li>
                <li><a data-toggle="tab" href="#menu6">ประกาศ</a></li>
                <li><a data-toggle="tab" href="#menu7">ประกาศ (แทน)</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                  <table class="table table-bordered">

                      <tr>
                          <td height="26" colspan="6" valign="top">
                              <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">มอ 987</font></strong></div>
                          </td>
                      </tr>
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


                      function DateThai($strDate)
	                     {
                      		$strYear = date("Y",strtotime($strDate))+543;
                      		$strMonth= date("n",strtotime($strDate));
                      		$strDay= date("j",strtotime($strDate));
                      		$strHour= date("H",strtotime($strDate));
                      		$strMinute= date("i",strtotime($strDate));
                      		$strSeconds= date("s",strtotime($strDate));
                      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                      		$strMonthThai=$strMonthCut[$strMonth];
                      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
                          return "$strDay $strMonthThai $strYear";
	                     }


                      $y					= date("Y");
                      $sql				= "select * from numcontrol where ID_TypeDoc = '1' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC Limit 20";
                      mysql_select_db('numberme',$connect);
                      $query2				= mysql_query($sql, $connect) or die(mysql_error());

                      $num_rows 			= mysql_num_rows($query2);
                      $num_fields			= mysql_num_fields($query2);

                      $i=0;

                      while($result=mysql_fetch_array($query2))	{

                      $Num_NumControl		=$result['Num_NumControl'];
                      $From_NumControl	=$result['From_NumControl'];
                      $To_NumControl		=$result['To_NumControl'];
                      $status		=$result['status'];
                      $Sub_NumControl		=$result['Sub_NumControl'];
                      $File_NumControl	=$result['File_NumControl'];
                      $Date_NumControl	=$result['Date_NumControl'];
                      $Sen_NumControl		=$result['Sen_NumControl'];
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
                                  <? echo ++$i;?>
                              </font></td>
                          <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                  <?
                                  if($status==0){
                                    echo "มอ 980/<font color='#0080ff'>".$Num_NumControl."</font>";
                                  }else{
                                    echo "มอ 980/<font color='#0080ff'> ว ".$Num_NumControl."</font>";
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
                          <td colspan="0" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                  <? echo $Sub_NumControl;?>
                              </font></td>
                          <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                  <?
                                  if ($File_NumControl != "-" && $File_NumControl != null){
                                  ?>
                                  <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                  <?
                                  }
                                  else if($File_NumControl == null){
                                  echo "-";
                                  }else{
                                  echo $File_NumControl;
                                  }
                                  ?>
                              </font></td>
                      </tr>
                      <?
                      // $i++;
                      }
                      ?>
                      <tr>
                          <td height="26" colspan="6" valign="top">
                              <div align="center"><strong></strong></div>
                          </td>
                      </tr>
                    </table>
                </div>
                <div id="menu2" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        ศธ 0521.3 (รองอธิการบดี)</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '2' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{
                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $status		=$result['status'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                          <?
                          if($status==0){
                            echo "ศธ 0521.3/<font color='#0080ff'>".$Num_NumControl."</font>";
                          }else{
                            echo "ศธ 0521.3/<font color='#0080ff'> ว ".$Num_NumControl."</font>";
                          }

                          ?>

                            </font></td>
                        <?
                        if($Date_NumControl!=null){
                        $d		= substr($Date_NumControl,8,2);
                        $m		= substr($Date_NumControl,5,2);
                        $y		= substr($Date_NumControl,0,4)+543;
                        $sdate=$d."-".$m."-".$y;
                        }else{
                        $sdate="-";
                        }

                        ?>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <!-- <font color="#009999">จาก
                                    <? echo $From_NumControl;?>
                                </font> -->

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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>
                <div id="menu3" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        ศธ 0521.3 (ปฏิบัติการแทนอธิการบดี)</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '3' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{
                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $status		=$result['status'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">

                          <?
                          if($status==0){
                            echo "ศธ 0521.3/<font color='#0080ff'>".$Num_NumControl."</font>";
                          }else{
                            echo "ศธ 0521.3/<font color='#0080ff'> ว ".$Num_NumControl."</font>";
                          }

                          ?>
                            </font></td>
                        <?
                        if($Date_NumControl!=null){
                        $d		= substr($Date_NumControl,8,2);
                        $m		= substr($Date_NumControl,5,2);
                        $y		= substr($Date_NumControl,0,4)+543;
                        $sdate=$d."-".$m."-".$y;
                        }else{
                        $sdate="-";
                        }

                        ?>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <!-- <font color="#009999">จาก
                                    <? echo $From_NumControl;?>
                                </font> -->
                                <!-- <br> -->
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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>
                <div id="menu4" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        คำสั่ง มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '4' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{

                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                      <?
                      if($Date_NumControl!=null){
                      $d		= substr($Date_NumControl,8,2);
                      $m		= substr($Date_NumControl,5,2);
                      $y		= substr($Date_NumControl,0,4)+543;
                      $sdate=$d."-".$m."-".$y;
                      }else{
                      $sdate="-";
                      }

                      ?>
                        <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo "คำสั่ง <font color='#0080ff'>".$Num_NumControl."</font>/".$y;?>
                            </font></td>

                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">

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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>

                <div id="menu5" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        คำสั่ง มหาวิทยาลัยสงขลานครินทร์ (ปฏิบัติการแทนอธิการบดี)</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '5' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{

                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                    <?
                    if($Date_NumControl!=null){
                    $d		= substr($Date_NumControl,8,2);
                    $m		= substr($Date_NumControl,5,2);
                    $y		= substr($Date_NumControl,0,4)+543;
                    $sdate=$d."-".$m."-".$y;
                    }else{
                    $sdate="-";
                    }

                    ?>
                    <tr>
                        <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo "คำสั่ง <font color='#0080ff'>".$Num_NumControl."</font>/".$y;?>
                            </font></td>

                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">

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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>
                <div id="menu6" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        ประกาศ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '6' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{

                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                    <?
                    if($Date_NumControl!=null){
                    $d		= substr($Date_NumControl,8,2);
                    $m		= substr($Date_NumControl,5,2);
                    $y		= substr($Date_NumControl,0,4)+543;
                    $sdate=$d."-".$m."-".$y;
                    }else{
                    $sdate="-";
                    }

                    ?>
                    <tr>
                        <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo "ประกาศ <font color='#0080ff'>".$Num_NumControl."</font>/".$y;?>
                            </font></td>

                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">

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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>
                <div id="menu7" class="tab-pane fade">
                  <table class="table table-bordered">
                    <tr>
                        <td height="26" colspan="6" valign="top">
                            <div align="center"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                        ประกาศ มหาวิทยาลัยสงขลานครินทร์ (ปฏิบัติการแทนอธิการบดี)</font></strong></div>
                        </td>
                    </tr>
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
                    $y					= date("Y");
                    $sql				= "select * from numcontrol where ID_TypeDoc = '7' and Year_NumControl = '$y' order by CAST(Num_NumControl AS DECIMAL(5,2)) DESC";
                    mysql_select_db('numberme',$connect);
                    $query2				= mysql_query($sql, $connect);

                    $num_rows 			= mysql_num_rows($query2);
                    $num_fields			= mysql_num_fields($query2);

                    $i=0;

                      while($result=mysql_fetch_array($query2))	{

                    $Num_NumControl		=$result['Num_NumControl'];
                    $From_NumControl	=$result['From_NumControl'];
                    $To_NumControl		=$result['To_NumControl'];
                    $Sub_NumControl		=$result['Sub_NumControl'];
                    $File_NumControl	=$result['File_NumControl'];
                    $Date_NumControl	=$result['Date_NumControl'];
                    $Sen_NumControl		=$result['Sen_NumControl'];
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
                    <?
                    if($Date_NumControl!=null){
                    $d		= substr($Date_NumControl,8,2);
                    $m		= substr($Date_NumControl,5,2);
                    $y		= substr($Date_NumControl,0,4)+543;
                    $sdate=$d."-".$m."-".$y;
                    }else{
                    $sdate="-";
                    }

                    ?>
                    <tr>
                        <td height="54" align="center" valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo ++$i;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo "ประกาศ <font color='#0080ff'>".$Num_NumControl."</font>/".$y;?>
                            </font></td>

                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo DateThai($Date_NumControl);?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">

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
                                </font> </font>
                        </td>
                        <td  valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <? echo $Sub_NumControl;?>
                            </font></td>
                        <td valign="middle" bgcolor="<?= $bg ?>"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                                <?

                                if ($File_NumControl != "-" && $File_NumControl != null){
                                ?>
                                <a href="<? echo "./upload/$File_NumControl";?>" target="_blank"><img src="./animation/pdf.gif" width="32" height="32" border="0"></a>
                                <?
                                }
                                else if($File_NumControl == null){
                                echo "-";
                                }else{
                                echo $File_NumControl;
                                }
                                ?>
                            </font></td>
                    </tr>
                    <?
                    $i++;
                    }
                    ?>
                    <tr valign="middle">
                        <td colspan="6" height="26"></td>

                    </tr>
                </table>
                </div>

            </div>
          </div>
            <!-- </div> -->
            <div id="footer">
                <?php require('UserControl/footer.php'); ?>
            </div>
            <!-- </div> -->

        </div>

    </body>

</html>
