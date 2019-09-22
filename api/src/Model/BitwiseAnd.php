<?php

namespace App\Model;

/**
 * BitwiseAnd Class
 * 
 * Defines the bitwise and type of operation
 */
class BitwiseAnd extends Operation
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber & $secondNumber;
    }
}