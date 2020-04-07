
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<?php
  class BaseClass {
    protected $name = 'BaseClass';
    function __construct() {
      print 'In ' . $this->name . ' constructor<br>';
    }
    function __destruct() {
      print 'Destroying ' . $this->name . '<br>';
    }
  }

  class SubClass extends BaseClass {
    function __construct() {
      $this->name = 'SubClass';
      parent::__construct();
    }
    function __destruct() {
      parent::__destruct();
    }
  }

  $obj1 = new SubClass;
  // In SubClass constructor
  $obj2 = new BaseClass;
  // In BaseClass constructor
  
  // Destroying BaseClass
  // Destroying SubClass
?>