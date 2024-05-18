<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class AllowedEmailDomain implements Rule
{
    public function passes($attribute, $value)
    {
        return Str::endsWith(Str::lower($value), ['@students.apiit.lk', '@apiit.lk']);
    }

    public function message()
    {
        return 'Invalid APIIT :attribute';

    }
}
