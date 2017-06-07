<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('operation_journal');
        }
        return redirect()->route('login');

    }

    public function detectRole()
    {
        if (Auth::check()) {
//            if (Auth::user()->hasRole('admin')) return redirect()->route('admin');
            return redirect()->route('operation_journal');
        }
        return redirect()->route('auth.login');
    }

    public function getHashString($str)
    {
        return $str . ' - ' . Hash::make($str);
    }
}
