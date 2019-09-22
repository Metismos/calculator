<?php

namespace App\Interfaces;

/**
 * Operation Interface
 * 
 * Defines the contract for any type of operation
 */
interface OperationInterface
{
    /**
     * Retrieve the type of operation
     */
    public function execute(float $firstNumber, float $secondNumber): float;
}