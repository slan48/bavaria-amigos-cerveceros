<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return User
     */
    public function create(array $input)
    {
        $validator = Validator::make($input, [
            'name' => ['string', 'max:255'],
            'dni' => ['string', 'max:255'],
            'phone' => ['string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'commercial_id' => ['required', 'string'],
        ])->validate();

        $user = User::where('commercial_id', $input['commercial_id'])->first();
        if ($user){
            if ($user->registered === 0){
                $user->name = $input['name'];
                $user->dni = $input['dni'];
                $user->phone = $input['phone'];
                $user->email = $input['email'];
                $user->username = $input['username'];
                $user->registered = true;
                $user->save();

                Auth::login($user, true);

                return $user;
            } else{
                Auth::login($user, true);

                return $user;
            }
        } else{
            throw ValidationException::withMessages(['commercial_id' => 'ID Comercio no existe']);
        }
    }
}
