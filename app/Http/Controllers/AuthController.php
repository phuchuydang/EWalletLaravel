<?php

namespace App\Http\Controllers;

use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Jobs\SendEmail;
use Illuminate\Contracts\View\View;
use Mail;

class AuthController extends Controller
{
    private AccountRepositoryInterface $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }
    
    
    public function checkSession()
    {
        if (!Session()->has('account')) {
            return true;
        }
        return false;
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            Session()->forget('account');
            return view('auth.login');
        }
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            Session()->forget('account');
            return view('auth.register');
        }
    }

    public function handleLogin(Request $request)
    {
        $data = $request->only('username', 'password');
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            $account = $this->accountRepository->getAccountByUsername($data['username']);
            if ($account) {
                if (Hash::check($data['password'], $account->password)) {
                    Session()->put('account', $account);
                    if ($account->is_actived == 0) {
                        return redirect()->route('auth.firstLogin.get');
                    }
                    Auth::login($account);
                    return redirect()->route('user.index');
                } else {
                    
                    $messageECL002 = config('constant.messages.error.ECL002');
                    Session()->flash('error', $messageECL002);
                    return redirect()->route('auth.login.get')->withInput();
                }
            }
            $messageECL001 = config('constant.messages.error.ECL001');
            Session()->flash('error', $messageECL001);
            return redirect()->back()->withInput();
        }
    }

    public function handleRegister(Request $request){
        $data = $request->all();
        $request->validate([
            'email' => 'required|email|max:50|unique:tbl_account',
            'fullname' => 'required|max:50',
            'phone' => 'required|max:13|unique:tbl_account',
            'address' => 'required',
            'birthday' => 'required',
            'fcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($this->accountRepository->getAccountByEmail($data['email'])) {
            $messageECL003 = config('constant.messages.error.ECL003');
            Session()->flash('error', $messageECL003);
            return redirect()->back()->withInput();
        } else {
            $username = rand(1000000000, 9999999999);
            $password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(6/strlen($x)) )),1,6);
            $data['username'] = $username;
            $data['password'] = $password;
            $request->validate([
                'email' => 'required|email|max:50|unique:accounts',
                'fullname' => 'required|max:50',
                'phone' => 'required|max:13|unique:accounts',
                'address' => 'required|max:50',
                'birthday' => 'required',
                'fcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if($account = $this->accountRepository->createUser($data)) {
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $account->email,
                    'fullname' => $account->fullname,
                );
                $job = (new SendEmail($data))->delay(now()->addSeconds(5));
                dispatch($job);
                return redirect()->route('auth.login.get')->with('success', 'Register successfully');
            }
            $messageECL004 = config('constant.messages.error.ECL004');
            Session()->flash('error', $messageECL004);
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function firstLogin()
    {
        if ($this->checkSession()) {
            return redirect()->route('auth.login.get');
        }
        return view('auth.firstLogin');
    }

    public function handleFirstLogin(Request $request)
    {
        $request->validate([
            'password' => 'required|max:50',
            'conf_password' => 'required|max:50',
        ]);
        $data = $request->only('password', 'conf_password');
        if ($data['password'] != $data['conf_password']) {
            $messageECL002 = config('constant.messages.error.ECL002');
            Session()->flash('error', $messageECL002);
            return redirect()->route('auth.firstLogin.get');
        }
        $accountSession = Session()->get('account');
        $account = $this->accountRepository->getAccountByUsername($accountSession->username);
        $account->password = Hash::make($data['password']);
        $account->is_actived = 1;
        $account->updated_date = date('Y-m-d H:i:s');
        $account->save();
        Auth::login($account);
        return redirect()->route('user.index');
    }
}
