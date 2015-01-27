<?php
  require_once '../classes/Calculator.php';

  class TestCalculator extends PHPUnit_Framework_TestCase{
    public function testAdd(){
      $a = new Calculator();
      $this->assertEquals(6, $a->add(4,4));
    }
  }//end class
?>
