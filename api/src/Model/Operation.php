<?php

namespace App\Model;

use App\Interfaces\OperationInterface;

/**
 * Operation Class
 * 
 * Defines a type of operation
 */
abstract class Operation implements OperationInterface
{
    public function execute(float $firstNumber, float $secondNumber): float
    {
        return 0.0;
    }
}