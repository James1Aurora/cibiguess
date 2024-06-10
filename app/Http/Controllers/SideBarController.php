<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SideBarController extends Controller
{
    public function showSidebar()
    {
        $user = Auth::user();
        return view('sidebar', compact('user'));
    }
}
