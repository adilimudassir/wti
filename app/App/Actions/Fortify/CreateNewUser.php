<?php

namespace App\Actions\Fortify;

use Domains\Auth\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Domains\Auth\Repositories\UserRepository;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \Domains\Auth\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'unique:users'],
            'password' => $this->passwordRules(),
            'account_type' => ['required'],
            'state' => ["required_if:account_type,'REGULAR STUDENT'"],
            'state_code' => ["required_if:account_type,'REGULAR STUDENT'"]
        ])->validate();

        return resolve(UserRepository::class)->create(request());
    }
}
