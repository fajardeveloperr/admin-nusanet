<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make(
            $input,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ],
            [
                'name.required' => 'Field Nama Lengkap Wajib Diisi',
                'name.string' => 'Nama Lengkap harus berupa karakter',
                'name.max' => 'Nama Lengkap harus memiliki max. 255 karakter',
                'email.required' => 'Field Email Wajib Diisi',
                'email.string' => 'Email harus berupa karakter',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email harus memiliki max. 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Field Password Wajib Diisi',
                'password.string' => 'Password harus berupa karakter',
                'password.confirmed' => 'Password tidak sama',
            ]
        )->validate();

        return User::create([
            'name' => $input['name'],
            'employee_id' => $input['employee_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'utype' => 'AuthSales'
        ]);
    }
}
