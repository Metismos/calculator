<?php

namespace App\Interfaces;

/**
 * ValidatorInterface
 * 
 * Defines the contract for a validation mechanism
 */
interface ValidatorInterface
{
    /**
     * Validates given parameters
     */
    public function validate(array $params): void;
}