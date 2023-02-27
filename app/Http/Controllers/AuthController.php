<?php

namespace App\Http\Controllers;

use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Models\Account;
use App\Repositories\AccountRepository;

class AuthController extends Controller
{
    private AccountRepositoryInterface $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        $data = $request->all();
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            $account = $this->accountRepository->getAccountByUsername($data['username']);
            if ($account) {
                if (Hash::check($data['password'], $account->password)) {
                    Auth::login($account , true);
                    Session()->put('account', $account);
                    if ($account->is_actived == 0) {
                        return redirect()->route('auth.firstLogin.get');
                    }
                    return redirect()->route('user.index');
                } else {
                    $messageECL001 = config('constant.messages.error.ECL001');
                    Session()->flash('error', $messageECL001);
                    return redirect()->route('auth.login.get');
                }
            }
            $messageECL001 = config('constant.messages.error.ECL001');
            Session()->flash('error', $messageECL001);
            return redirect()->back();
        }
    }

    public function handleRegister(Request $request){

    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect('/')->with('message', 'Successfully logged out');
    }

    public function firstLogin()
    {
        return view('auth.firstLogin');
    }

    public function handleFirstLogin(Request $request)
    {
        $request->validate([
            'password' => 'required|max:50',
            'confirm_password' => 'required|max:50',
        ]);
        $data = $request->all();
        if ($data['password'] != $data['confirm_password']) {
            $messageECL002 = config('constant.messages.error.ECL002');
            Session()->flash('error', $messageECL002);
            return redirect()->route('account.changePassword');
        }
        $account = Session()->get('account');
        $account->password = Hash::make($data['password']);
        $account->is_actived = 1;
        $account->save();
        return redirect()->route('account.index');
    }
}
