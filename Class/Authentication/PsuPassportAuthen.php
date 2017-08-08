<?php

  class PsuPassportAuthen
  {
    private $username;
    private $password;

    public function __construct($username="",$password="")
    {
      $this->username=$username;
      $this->password=$password;
    }

    public function Authenticate()
    {
      require_once 'nusoap_/nusoap.php';

      $request=array(
        'username'=>$this->username,
        'password'=>$this->password
      );

      $client = new nusoap_client('https://passport.psu.ac.th/authentication/authentication.asmx?wsdl', true);
      $client->decode_utf8 = false;
      $proxy = $client->getProxy();
      $authen = $proxy->Authenticate($request);

      return $authen["AuthenticateResult"];
    }
  }
 ?>
