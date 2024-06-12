<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\View\view;

class UserController extends Controller
{
    public function showProfile()
    {
        try {
            $user = User::findOrFail(auth()->user()->id);

            return view('profile.index', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}