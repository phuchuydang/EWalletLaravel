<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

class UserController extends Controller
{
    private AccountRepositoryInterface $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    public function handleProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:50',
            'address' => 'required|max:50',
        ]);
        $account_id = Auth::user()->id;
        $this->accountRepository->updateUser($account_id, $request->all());
        $messageSCL002 =  config('constant.messages.success.SCL002');
        return redirect()->route('user.profile.get')->with('success', $messageSCL002);
    }
}