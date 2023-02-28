<?php

namespace App\Repositories;

use App\Interfaces\WalletRepositoryInterface;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WalletRepository implements WalletRepositoryInterface
{
    private Wallet $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function createWallet($id)
    {
        $this->wallet->create([
            'user_id' => $id,
            'balance' => 0,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
    }

}