<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserProfileHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = auth()->user();

        $user_infos = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
        ];

        return view('components.user-profile-header')
            ->with(['user_infos' => $user_infos]);
    }
}
