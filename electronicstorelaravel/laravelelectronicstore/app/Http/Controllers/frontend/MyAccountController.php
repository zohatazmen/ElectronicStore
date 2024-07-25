<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function showAccount()
    {
        $user = Auth::user();
        return view('frontend.My-account', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->save();

        return redirect()->route('account')->with('success', 'Account updated successfully');
    }
}