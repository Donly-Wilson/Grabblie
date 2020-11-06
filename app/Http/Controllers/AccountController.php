<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        #Adding " ->middleware('auth'); " to the end off this account route in " route/web.php " does the same
    }

    public function index()
    {
        return view('account/dashboard');
    }
}
