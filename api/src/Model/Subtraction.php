<?php

namespace App\Model;

/**
 * Subtraction Class
 * 
 * Defines the subtraction type of operation
 */
class Subtraction extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber - $secondNumber;
    }
}