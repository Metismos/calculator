<?php

namespace App\Factory;

use App\Interfaces\OperationInterface;
use App\Interfaces\OperationFactoryInterface;
// use App\Model\Addition;

/**
 * OperationFactory Class
 * 
 * Defines the factory for creating operations
 */
class OperationFactory implements OperationFactoryInterface
{
    public function createOperation(string $operationType): OperationInterface
    {
        $operationClass = 'App\\Model\\' . $operationType;

        if (!class_exists($operationClass)) {
            throw new \InvalidArgumentException("Operation type invalid ($operationType)");
        }

        return new $operationClass;
    }
}