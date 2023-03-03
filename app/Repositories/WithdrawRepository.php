<?php

namespace App\Repositories;

use App\Interfaces\WithdrawRepositoryInterface;
use App\Interfaces\WalletRepositoryInterface;
use App\Models\History;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WithdrawRepository implements WithdrawRepositoryInterface
{
    private Withdraw $withdraw;
    private WalletRepositoryInterface $wallet;
    private History $history;

    public function __construct(Withdraw $withdraw, WalletRepositoryInterface $wallet, History $history)
    {
        $this->wallet = $wallet;
        $this->withdraw = $withdraw;
        $this->history = $history;
    }

    public function withdraw($id,$data)
    {
        $data['user_id'] = $id;
        
        if ($data['money'] > 5000000) {
            $data['is_approved'] = 0;
        } else {
            $wallet = $this->wallet->getWalletByUserId($id);
            $wallet->balance -= $data['money'] * 1.05;
            $wallet->save();
            $data['is_approved'] = 1;
        }
        $data['amount'] = $data['money'];
        if ($data['note'] == null) {
            $data['note'] = '';
        } else {
            $data['note'] = $data['note'];
        }
        $data['created_date'] = date('Y-m-d');
        $data['updated_date'] = date('Y-m-d');
        $this->withdraw->create($data);
        //insert to history
        $this->history->create([
            'user_id' => $id,
            'amount' => $data['money'],
            'type' => 3,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
        return true;
    }

}