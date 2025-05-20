<?php

namespace App\MonsTools\helper;

class MultipleDomainsValidator
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Split the value by newline to get each domain
        $domains = explode(PHP_EOL, $value);

        foreach ($domains as $domain) {
            if (!filter_var($domain, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
                return false;
            }
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
        return 'Invalid domain format.';
    }
}
