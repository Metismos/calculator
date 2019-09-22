<?php

namespace App\Interfaces;

/**
 * OperationFactoryInterface Interface
 * 
 * Defines the contract for creating operations
 */
interface OperationFactoryInterface
{
    /**
     * Creates a new operation
     */
    public function createOperation(string $operationType): OperationInterface;
}