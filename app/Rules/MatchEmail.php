<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class MatchEmail implements Rule
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

        $current_user_id = auth()->user()->id;

        $users = User::all();

        foreach ($users as $user) {
            if ($user->email === $value && $user->id === $current_user_id) {
                return true;
            } elseif ($user->email === $value && $user->id !== $current_user_id) {
                return false;
            }
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute already exists';
    }
}
