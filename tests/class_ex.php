<?php

class class_ex{
  private $amout;

  public function __construct($amout=0){
    $this->amout=$amout;
  }

  public function getNum(){
    return $this->amout;
  }
}
// $chk=new class_ex(30);
// echo $chk->getNum();
?>
