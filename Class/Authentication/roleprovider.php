<?php
include_once('PsuPassportAuthen.php');
class roleprovider extends PsuPassportAuthen
{
  private $app_id;

  public function __construct($app_id="",$username="")
  {
    parent::__construct($username);
    $this->app_id=$app_id;
  }

  public function getroles()
  {
      $method="GET";
      $url = "http://api.phuket.psu.ac.th/roleprovider/service/getroles/" . $this->app_id . "/" . parent::getUsername();
      $result = CallAPI($method, $url); // function CallAPI is in this file.
      $json_data = json_decode($result, true);

      return $json_data;
  }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// FUNCTION /////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CallAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }
 ?>
