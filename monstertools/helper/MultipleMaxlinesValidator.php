<?php

namespace App\MonsTools\helper;



class MultipleMaxlinesValidator
{
    protected $max;

    /**
     * Create a new rule instance.
     *
     * @param int $max
     * @return void
     */
    public function __construct($max = 5)
    {
        $this->max = $max;
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
        // Split the value by newline to get each line
        $lines = explode(PHP_EOL, $value);

        if (count($lines) > $this->max) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Max {$this->max} lines allowed.";
    }
}
