<?php

session_start();
include("A_connect.inc");

include('lib/mainfunction.php');
include('lib/web.inc.php');
include("function/roles.php");


require 'nusoap_/nusoap.php';
$function = "Authenticate";
$username = $_POST['username'];
$password = $_POST['password'];
$request = array(
    'username' => $username,
    'password' => $password
);
$client = new nusoap_client('https://passport.psu.ac.th/authentication/authentication.asmx?wsdl', true);
$client->decode_utf8 = false;

$proxy = $client->getProxy();
$authen = $proxy->Authenticate($request);
if ($authen["AuthenticateResult"] == "true") {

    // $sql				= "select * from users_permission where passport_username='$username' and status=1";
    // mysql_select_db('numberme',$connect);
    // $query				= mysql_query($sql, $connect);
    // $num_rows 			= mysql_num_rows($query);

    $method = "GET";
    $app_id = "720053c0-2faa-11e7-8127-45355c1349cc";
    $username = "nitiwat.t";
    $url = "http://api.phuket.psu.ac.th/roleprovider/service/getroles/" . $app_id . "/" . $username;
    $result = CallAPI($method, $url);
    $json_data = json_decode($result, true);
    $number_role = count($json_data["result"]);

    if ($number_role > 0) {
        $result = $proxy->GetStaffDetails($request);
        $GetStaffDetailsResult = $result['GetStaffDetailsResult'];
        $_SESSION['ID_Member'] = $GetStaffDetailsResult["string"][0];
        $_SESSION['Name_Member'] = $GetStaffDetailsResult["string"][1] . " " . $GetStaffDetailsResult["string"][2];
        $_SESSION['access'] = "pass";

        $roles=array();
        $hasRole = false;
          foreach($json_data["result"] as $data) {

                array_push($roles,$data["role_name_eng"]);
          }
          $_SESSION['roles']=$roles;

          // foreach($_SESSION['roles'] as $role){
          //   echo $role;
          // }

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
