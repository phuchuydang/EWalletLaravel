<?php

namespace App\Repositories;

use App\Interfaces\WalletRepositoryInterface;
use App\Models\Wallet;
use App\Models\History;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WalletRepository implements WalletRepositoryInterface
{
    private Wallet $wallet;
    private History $history;

    public function __construct(Wallet $wallet, History $history)
    {
        $this->wallet = $wallet;
        $this->history = $history;
    }

    public function createWallet($id)
    {
        $this->wallet->create([
            'user_id' => $id,
            'balance' => 0,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
    }

    public function deposit($amount, $id)
    {
        $wallet = $this->wallet->where('user_id', $id)->whereNull('deleted_date')->first();
        if (!$wallet) {
            return false;
        }
        $wallet->balance += $amount;
        $wallet->updated_date = date('Y-m-d H:i:s');
        $wallet->save();
        //insert to history
        $this->history->create([
            'user_id' => $id,
            'amount' => $amount,
            'type' => 1,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
        return true;
    }

    public function getWalletByUserId($id)
    {
        return $this->wallet->where('user_id', $id)->whereNull('deleted_date')->first();
    }

    public function transfer($data)
    {
        $sender = $this->wallet->where('user_id', $data['sender_id'])->whereNull('deleted_date')->first();
        $receiver = $this->wallet->where('user_id', $data['receiver_id'])->whereNull('deleted_date')->first();
        if (!$sender || !$receiver) {
            return false;
        }
        if ($sender->balance < $data['amount']) {
            return false;
        }
        $sender->balance -= $data['amount'];
        $sender->updated_date = date('Y-m-d H:i:s');
        $sender->save();
        $receiver->balance += $data['amount'];
        $receiver->updated_date = date('Y-m-d H:i:s');
        $receiver->save();
        $this->history->create([
            'user_id' => $data['sender_id'],
            'amount' => $data['amount'],
            'type' => 2,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
        return true;
    }
    

}