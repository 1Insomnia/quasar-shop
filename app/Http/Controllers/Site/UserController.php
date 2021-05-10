<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Order;
use App\Rules\MatchEmail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;

class UserController extends Controller
{
    /**
     * @var \App\Repositories\UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $user = $this->userRepository->find($id);
        $user_cart_items = Cart::count();
        $user_orders_count = $user->orders->count();

        return view('site.user.show')
            ->with([
                'user' => $user,
                'user_cart_items' => $user_cart_items,
                'user_orders_count' => $user_orders_count,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|Application
    {
        $user = $this->userRepository->find($id);
        return view('site.user.edit')
            ->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            // Customer Infos
            'email' => ['required', 'email', new MatchEmail],
            'first_name' => 'required|min:2|max:80',
            'last_name' => 'required|min:2|max:80',

            // Shipping Infos
            'address' => 'nullable|min:6|max:100',
            'zip_code' => [
                'nullable',
                'regex:/^[0-9]{5}(?:-[0-9]{4})?$/'
            ],
            'city' => 'nullable|min:1|max:85',
            'country' => 'nullable|min:4|max:56',
            'phone' => [
                'nullable',
                'regex:/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/'
            ],
        ];

        $this->validate($request, $rules);

        $user->update([
            // Customer Infos
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // Shipping Infos
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.profile.show', $id)->with('message', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listOrders()
    {
        $id = auth()->user()->id;
        $orders = Order::where('user_id', $id)->get();
        return view('site.user.list-orders')->with(['orders' => $orders]);
    }
}
