<?php
  use PHPUnit\Framework\TestCase;

  class testAuthen extends TestCase{

    // public $authen;

    // public function test_GetUsername()
    // {
    //   $authen=new Authen("nitiwat.t","123456789");
    //   $this->assertEquals("nitiwat.t",$authen->getUsername());
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

    public function test_PsuPassportAuthenticatFail()
    {
      $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","123456789");
      $this->assertNotEquals("true",$PsuPassportAuthen->Authenticate());
    }

    public function test_roleprovider_getroles()
    {
      $roleprovider=new roleprovider("720053c0-2faa-11e7-8127-45355c1349cc","nitiwat.t");
      $this->assertEquals(1,$roleprovider->getroles());
    }
  }
 ?>
