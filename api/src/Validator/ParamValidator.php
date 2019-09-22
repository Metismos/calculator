<?php

namespace App\Validator;

use App\Interfaces\ValidatorInterface;
/**
 * ParamValidator Class
 * 
 * Defines the validation needed for given params
 */
class ParamValidator implements ValidatorInterface
{
    public function validate(array $params): void
    {
        foreach ($params as $param) {
            $paramType = key($param);
            $paramValue = $param[$paramType];

            switch ($paramType) {
                case 'alphabetic':
                    if (!ctype_alpha($paramValue)) {
                        throw new \InvalidArgumentException("$paramValue, is not $paramType");
                    }
                    break;
                case 'number':
                    if (!is_numeric($paramValue)) {
                        throw new \InvalidArgumentException("$paramValue, is not a $paramType");
                    }
                    break;
                default:
                    break;
            }
        }
    }
}