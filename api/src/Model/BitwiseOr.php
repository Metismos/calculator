<?php

namespace App\Model;

/**
 * BitwiseOr Class
 * 
 * Defines the bitwise or type of operation
 */
class BitwiseOr extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber | $secondNumber;
    }
}