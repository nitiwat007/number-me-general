<?php
  use PHPUnit\Framework\TestCase;
  //include_once('/../Class/Authentication/Authen.php');
  include_once('/../Class/Authentication/PsuPassportAuthen.php');
  include_once('/../Class/Authentication/roleprovider.php');

  class testAuthen extends TestCase{

    private $username="nitiwat.t";
    private $password="";
    private $wrongpassword="123456789";

    // public $authen;

    // public function test_GetUsername()
    // {
    //   $authen=new Authen("","123456789");
    //   $this->assertEquals("",$authen->getUsername());
    // }
    //
    // public function test_GetPassword()
    // {
    //   $authen=new Authen("nitiwat.t","123456789");
    //   $this->assertEquals("123456789",$authen->getPassword());
    // }

    // public function test_GetUsernameFail()
    // {
    //   $authen=new Authen("nitiwat.t2","123456789");
    //   $this->assertNotEquals("nitiwat.t",$authen->getUsername());
    // }
    //
    // public function test_GetPasswordFail()
    // {
    //   $authen=new Authen("nitiwat.t","1234567890");
    //   $this->assertNotEquals("123456789",$authen->getPassword());
    // }

    // public function test_PsuPassportAuthenticate()
    // {
    //   $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","123456789");
    //   $this->assertNotEquals("true",$PsuPassportAuthen->Authenticate());
    // }

    // public function test_PsuPassportAuthenticate()
    // {
    //   $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","xxxxxxxxxx"); //Password for test
    //   $this->assertEquals("true",$PsuPassportAuthen->Authenticate());
    // }

    public function test_PsuPassportAuthenticat()
    {
      $PsuPassportAuthen=new PsuPassportAuthen($this->username,$this->password);
      $this->assertEquals("true",$PsuPassportAuthen->Authenticate());
    }

    public function test_PsuPassportAuthenticatFail()
    {
      $PsuPassportAuthen=new PsuPassportAuthen($this->username,$this->wrongpassword);
      $this->assertNotEquals("true",$PsuPassportAuthen->Authenticate());
    }

    public function test_roleprovider_getroles()
    {
      $roleprovider=new roleprovider("720053c0-2faa-11e7-8127-45355c1349cc",$this->username);
      $json_data = $roleprovider->getroles();
      $number_role = count($json_data["result"]);
      $this->assertEquals(1,$number_role);
    }

    public function test_PsuPassportAuthen_GetStaffDetails()
    {
      $PsuPassportAuthen=new PsuPassportAuthen($this->username,$this->password);
      $GetStaffDetailsResult = $PsuPassportAuthen->GetStaffDetails();
      $staff_id=$GetStaffDetailsResult["string"][0];
      $this->assertEquals("0016508",$staff_id);
    }

    public function test_PsuPassportAuthen_GetUserDetails()
    {
      $PsuPassportAuthen=new PsuPassportAuthen($this->username,$this->password);
      $GetUserDetailsResult = $PsuPassportAuthen->GetUserDetails();
      $user_id=$GetUserDetailsResult["string"][3];
      $this->assertEquals("0016508",$user_id);
    }
  }
 ?>
