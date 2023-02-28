<?php

namespace App\Interfaces;

use App\Http\Requests\StoreAccountRequest;

interface AccountRepositoryInterface
{
    public function getAccountByUsername($username);

    public function getAccountByEmail($email);

    public function createUser($data);

    public function updateUser($account_id, $data);

    public function updateIsAbnormal($id);

    public function resetIsAbnormal($id);
}