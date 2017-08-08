<?php
  use PHPUnit\Framework\TestCase;

  class testAuthen extends TestCase{

    // public $authen;

    public function test_GetUsername(){
      $authen=new Authen("nitiwat.t","123456789");
      $this->assertEquals("nitiwat.t",$authen->getUsername());
    }

    public function test_GetPassword(){
      $authen=new Authen("nitiwat.t","123456789");
      $this->assertEquals("123456789",$authen->getPassword());
    }

    public function test_GetUsernameFail(){
      $authen=new Authen("nitiwat.t2","123456789");
      $this->assertNotEquals("nitiwat.t",$authen->getUsername());
    }

    public function test_GetPasswordFail(){
      $authen=new Authen("nitiwat.t","1234567890");
      $this->assertNotEquals("123456789",$authen->getPassword());
    }

    public function test_PsuPassportAuthenticat(){
      $PsuPassportAuthen=new PsuPassportAuthen("nitiwat.t","123456789");
      $this->assertNotEquals("true",$PsuPassportAuthen->Authenticate());
    }
  }
 ?>
