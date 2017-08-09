<?php
  abstract class Authen
  {
    private $username;
    private $password;

    public function __construct($username="",$password=""){
      $this->username=$username;
      $this->password=$password;
    }

    public function getUsername(){
      return $this->username;
    }
    public function getPassword(){
      return $this->password;
    }

    public abstract function Authenticate();

  }

  class PsuPassportAuthen extends Authen
  {
    private $client;

    public function __construct($username="",$password="")
    {
      parent::__construct($username,$password);
      require_once 'nusoap_/nusoap.php';
      $client = new nusoap_client('https://passport.psu.ac.th/authentication/authentication.asmx?wsdl', true);
      $client->decode_utf8 = false;
      $this->proxy= $client->getProxy();
    }

    public function Authenticate()
    {

      $request=array(
        'username'=>parent::getUsername(),
        'password'=>parent::getPassword()
      );
      $authen = $this->proxy->Authenticate($request);
      return $authen["AuthenticateResult"];
    }



    public function GetStaffDetails()
    {
      require_once 'nusoap_/nusoap.php';
    }
  }

  class roleprovider extends PsuPassportAuthen
  {
    private $app_id;

    public function __construct($app_id="",$username="")
    {
      $this->app_id=$app_id;
      $this->username=$username;
    }

    public function getroles()
    {
        $method="GET";
        $url = "http://api.phuket.psu.ac.th/roleprovider/service/getroles/" . $this->app_id . "/" . $this->username;
        $result = CallAPI($method, $url); // function CallAPI is in this file.
        $json_data = json_decode($result, true);
        $number_role = count($json_data["result"]);

        return $number_role;
    }
  }



///////////////////////////////////////// function ///////////////////////////////////////////

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
