<?php

namespace App\Service;

use App\Interfaces\CalculationInterface;
use App\Interfaces\OperationInterface;

/**
 * Calculation Class
 * 
 * A service to calculate two numbers by a specific type of operation
 */
class Calculation implements CalculationInterface
{
    public function execute(float $firstNumber, float $secondNumber, OperationInterface $operation): float
    {
        return $operation->execute($firstNumber, $secondNumber);
    }
}