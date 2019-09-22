<?php

namespace App\Model;

/**
 * Multiplication Class
 * 
 * Defines the multiplication type of operation
 */
class Multiplication extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber * $secondNumber;
    }
}