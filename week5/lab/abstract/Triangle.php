<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'Polygon.php';

class Triangle extends Polygon {
    public $base;
    public $height;
    
    public function getArea() {
        return (($this->base * $this->height) / 2);
    }
    
    public function getNumberOfSides() {
        return (3);
    }
}
