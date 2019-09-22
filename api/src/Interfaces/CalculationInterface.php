<?php

namespace App\Interfaces;

/**
 * Calculation Interface
 * 
 * Defines the contract for a calculation service
 */
interface CalculationInterface
{
    /**
     * Retrieve the type of operation
     */
    public function execute(float $firstNumber, float $secondNumber, OperationInterface $operation): float;
}