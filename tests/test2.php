<?php
use PHPUnit\Framework\TestCase;

class Test_class extends TestCase
{
    public function test_comblid()
    {
        $chk=new class_ex(30);
        $this->assertEquals(30,$chk->getNum());
    }
}
?>
