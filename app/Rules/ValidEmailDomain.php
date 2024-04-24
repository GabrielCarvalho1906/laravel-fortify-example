<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidEmailDomain implements Rule
{
    public function passes($attribute, $value)
    {
        $allowedDomains = ['estracta.com', 'e-stracta.com'];
        [$user, $domain] = explode('@', $value);

        return in_array($domain, $allowedDomains);
    }

    public function message()
    {
        return 'The email must be from a valid domain: estracta.com or e-stracta.com';
    }
}
