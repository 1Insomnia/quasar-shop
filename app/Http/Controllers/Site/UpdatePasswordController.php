<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit(int $id)
    {
        return view('site.update_password.edit');
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user = $this->userRepository->find($id);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.profile.show', $user->id)->with('message', 'Password updated');
    }
}