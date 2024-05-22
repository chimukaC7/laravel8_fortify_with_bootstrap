<?php

namespace App\Actions\Fortify;


use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            // Require at least 8 characters...
            Password::min(8)
                // Require at least one letter...
//                ->letters()
                // Require at least one uppercase and one lowercase letter...
                ->mixedCase()
                // Require at least one number...
                ->numbers()
                // Require at least one symbol...
                ->symbols()
                ->uncompromised(),
            'confirmed'];
    }
}
