<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllowedEmailDomain implements Rule
{
    /**
     * The allowed email domains.
     *
     * @var array
     */
    private $allowedDomains;

    /**
     * Create a new rule instance.
     *
     * @param array $allowedDomains
     */
    public function __construct(array $allowedDomains)
    {
        $this->allowedDomains = $allowedDomains;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Ensure that $value is a valid email
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        list($user, $domain) = explode('@', $value);

        // Ensure that $allowedDomains is an array and not empty
        if (is_array($this->allowedDomains) && !empty($this->allowedDomains)) {
            return in_array($domain, $this->allowedDomains);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must have an allowed email domain.';
    }
}
