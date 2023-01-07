<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PointCoordenateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return is_numeric($value) && $value >= 0 && $value <= 4294967295;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Attribut :attribute must be a number between 0 and 4294967295.';
    }
}
