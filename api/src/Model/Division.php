<?php

namespace App\Model;

/**
 * Division Class
 * 
 * Defines the division type of operation
 */
class Division extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber / $secondNumber;
    }
}