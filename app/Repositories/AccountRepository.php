<?php

namespace App\Repositories;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\AccountRepositoryInterface;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountRepository implements AccountRepositoryInterface
{
    private Account $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getAccountByUsername($username)
    {
        return $this->account->where('username', $username)->whereNull('deleted_date')->firstOrFail();
    }

    public function getAccountByEmail($email)
    {
        return $this->account->where('email', $email)->whereNull('deleted_date')->firstOrFail();
    }

    public function createUser($data){
        $data['password'] = Hash::make($data['password']);
        $data['is_actived'] = 0;
        $data['is_verified'] = 0;
        $data['is_abnormal'] = 0;
        $data['created_date'] = date('Y-m-d H:i:s');
        $fcard = $data['fcard'];
        $bcard = $data['bcard'];
        $fcardName = $fcard->getClientOriginalName();
        $fcardName = $bcard->getClientOriginalName();
        $namefcard = current(explode('.', $fcardName));
        $namebcard = current(explode('.', $fcardName));
        $newfcard = $namefcard . '_' . rand(9,999999999999999) .'.' . $fcard->getClientOriginalExtension();
        $newbcard = $namebcard . '_' . rand(9,999999999999999) .'.' . $bcard->getClientOriginalExtension();
        $path = 'uploads/identity_card';
        $fcard->storeAs($path, $newfcard);
        $bcard->storeAs($path, $newbcard);
        $data['first_identity_card'] = $newfcard;
        $data['second_identity_card'] = $newbcard;
        $account = $this->account->create($data);
        $account->save();
        return $account;
    }

    public function updateUser($account_id, $data){
        $account = $this->account->find($account_id);
        $account->name = $data['name'];
        $account->email = $data['email'];
        $account->phone = $data['phone'];
        $account->address = $data['address'];
        $account->updated_date = date('Y-m-d H:i:s');
        $account->save();
        return $account;
    }
}