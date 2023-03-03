<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function checkRole()
    {
        if (Auth::user()->is_admin != 1) {
            Auth::logout();
            Session::flash('error', 'You are not authorized to access this page');
            return redirect()->route('auth.login.get');
        }
    }

    public function index()
    {
        $this->checkRole();
        return view('admin.index');
    }

    public function approveWithdraw()
    {
        $this->checkRole();
        return view('admin.approveWithdraw');
    }
}
