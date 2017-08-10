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

/////////////////////////////////////////////////PsuPassportAuthen/////////////////////////////////////////////////

  class PsuPassportAuthen extends Authen
  {
    private $client;
    private $request;

    public function __construct($username="",$password="")
    {
      parent::__construct($username,$password);
      $this->request=array(
        'username'=>parent::getUsername(),
        'password'=>parent::getPassword()
      );
      require_once 'nusoap_/nusoap.php';
      $client = new nusoap_client('https://passport.psu.ac.th/authentication/authentication.asmx?wsdl', true);
      $client->decode_utf8 = false;
      $this->proxy= $client->getProxy();
    }

    public function Authenticate()
    {

      $authen = $this->proxy->Authenticate($this->request);
      return $authen["AuthenticateResult"];
    }


    public function GetStaffDetails()
    {

      $GetStaffDetails=$this->proxy->GetStaffDetails($this->request);
      return $GetStaffDetails['GetStaffDetailsResult'];
    }
  }


  /////////////////////////////////////////////////roleprovider/////////////////////////////////////////////////

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



///////////////////////////////////////// function //////////////////////////////////////////////////////

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
