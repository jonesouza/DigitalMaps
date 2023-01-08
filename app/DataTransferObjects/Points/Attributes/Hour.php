<?php

namespace App\DataTransferObjects\Points\Attributes;

use Attribute;
use Spatie\DataTransferObject\Validator;
use Spatie\DataTransferObject\Validation\ValidationResult;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class Hour implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if (!preg_match('/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
            return ValidationResult::invalid("Value should be a valid hour in format HH:MM");
        }

        return ValidationResult::valid();
    }
}
