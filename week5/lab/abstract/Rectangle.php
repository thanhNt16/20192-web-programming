<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Polygon.php';

class Rectangle extends Polygon {
    public $width;
    public $height;
    
    public function getArea() {
        return ($this->height * $this->width);
    }
    
    public function getNumberOfSides() {
        return (4);
    }
}