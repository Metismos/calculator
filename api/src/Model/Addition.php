<?php

namespace App\Model;

/**
 * Addition Class
 * 
 * Defines the addition type of operation
 */
class Addition extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber + $secondNumber;
    }
}