<?php

session_start();
include("A_connect.inc");
include('lib/mainfunction.php');
include('lib/web.inc.php');
include_once('Class/Authentication/Authen.php');
include_once('Class/Authentication/PsuPassportAuthen.php');
include_once('Class/Authentication/roleprovider.php');

$username = $_POST['username'];
$password = $_POST['password'];

$PsuPassportAuthen=new PsuPassportAuthen($username,$password);


if ($PsuPassportAuthen->Authenticate() == "true") {

    $app_id = "720053c0-2faa-11e7-8127-45355c1349cc";
    $roleprovider=new roleprovider($app_id,$username);
    $json_data = $roleprovider->getroles();
    $number_role = count($json_data["result"]);

    if ($number_role > 0) {

        $GetStaffDetailsResult = $PsuPassportAuthen->GetStaffDetails();

        $_SESSION['ID_Member'] = $GetStaffDetailsResult["string"][0];
        $_SESSION['Name_Member'] = $GetStaffDetailsResult["string"][1] . " " . $GetStaffDetailsResult["string"][2];
        $_SESSION['access'] = "pass";

        $roles=array();
        $hasRole = false;
          foreach($json_data["result"] as $data) {

                array_push($roles,$data["role_name_eng"]);
          }
          $_SESSION['roles']=$roles;
;
        echo '<META HTTP-EQUIV="Refresh"  CONTENT="0;URL=main.php">';
    } else {
        echo "YOU DON'T HAVE PERMISSION";
        echo '<META HTTP-EQUIV="Refresh"  CONTENT="0;URL=index.php">';
    }
} else {
    echo "YOU DON'T HAVE PERMISSION";
    echo '<META HTTP-EQUIV="Refresh"  CONTENT="0;URL=index.php">';
}
?>
