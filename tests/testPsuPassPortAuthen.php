<?php
  use PHPUnit\Framework\TestCase;

  class testPsuPassPortAuthen extends TestCase{

    // public $authen;

    public function test_PsuPassportAuthenticate()
    {
      $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","xxxxxxxxxx"); //Password for test
      $this->assertEquals("true",$PsuPassportAuthen->Authenticate());
    }

    public function test_PsuPassportAuthenticatFail()
    {
      $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","123456789");
      $this->assertNotEquals("true",$PsuPassportAuthen->Authenticate());
    }
  }
 ?>
