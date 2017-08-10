<?php
include_once('Authen.php');
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

  public function GetStaffID()
  {
    $GetStaffID=$this->proxy->GetStaffID($this->request);
    return $GetStaffID['GetStaffIDResult'];
  }

  public function GetStudentDetails()
  {
    $GetStudentDetails=$this->proxy->GetStudentDetails($this->request);
    return $GetStudentDetails['GetStudentDetailsResult'];
  }

  public function GetUserDetails()
  {
    $GetUserDetails=$this->proxy->GetUserDetails($this->request);
    return $GetUserDetails['GetUserDetailsResult'];
  }
}
 ?>
