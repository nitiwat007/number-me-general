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
        <title>ระบบออกเลขหนังสือราชการ ภาควิชาวิศวกรรมเครื่องกล</title>
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

    </head>
    <body>
      <div class="container">
        <div id="page">
            <div id="menu">
                <?php require('UserControl/topMenu.php'); ?>
                <?

                //echo $_GET["Num_NoneNum"];
                $Num_NumControl 			= $_GET["Num_NumControl"];
                $ID_TypeDoc					= $_GET["ID_TypeDoc"];
                $circular           = $_GET["circular"];

                //echo $url2;
                //$Num_NoneNum				= $_GET["Num_NoneNum"];

                $sql				= "select * from typedoc where ID_TypeDoc like '$ID_TypeDoc'";
                mysql_select_db('numberme',$connect);
                $query				= mysql_query($sql ,$connect);

                $result				= mysql_fetch_array($query);
                $Name_TypeDoc		= $result['Name_TypeDoc'];
                $TypeDocValue		= $result['TypeDocValue'];
                $y 					= date("Y")+543;
                  $url2="managedocument.php?Num_NumControl=$Num_NumControl&ID_TypeDoc=$ID_TypeDoc&year=$y";
                ?>
            </div>
            <div id="body_area">
                <div>
                    <table class="table table-bordered">
                        <!--DWLayoutTable-->
                        <tr valign="middle">
                            <td width="835" height="52" valign="top"><div align="left">
                                    <blockquote>
                                        <blockquote>
                                            <p><font color="#FF0000" size="4" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขหนังสือของคุณคือ

                                                    <?
                                                    if ($ID_TypeDoc == 1 || $ID_TypeDoc == 2 || $ID_TypeDoc == 3){
                                                      if($circular==0){
                                                        echo $TypeDocValue."/".$Num_NumControl;
                                                      }else{
                                                        echo $TypeDocValue."/ ว ".$Num_NumControl;
                                                      }

                                                    }
                                                    if ($ID_TypeDoc == 4 || $ID_TypeDoc == 5 || $ID_TypeDoc == 6 || $ID_TypeDoc == 7){
                                                    echo $TypeDocValue." ที่ ".$Num_NumControl."/".$y;
                                                    }
                                                    // if ($ID_TypeDoc == 5){
                                                    // echo $TypeDocValue." เลขที่ ".$Num_NoneNum;
                                                    // }
                                                    ?>

                                                </font></p>
                                            <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กรุณาอับโหลดเอกสาร

                                                    <a href="<?=$url2?>">อับโหลดไฟล์ </a></font></p>
                                        </blockquote>
                                    </blockquote>
                                </div></td>
                        </tr>
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
