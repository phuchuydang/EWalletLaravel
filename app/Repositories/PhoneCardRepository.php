<?php

namespace App\Repositories;

use App\Interfaces\PhoneCardRepositoryInterface;
use App\Interfaces\WalletRepositoryInterface;
use App\Interfaces\WithdrawRepositoryInterface;
use App\Models\History;
use App\Models\PhoneCard;

class PhoneCardRepository implements PhoneCardRepositoryInterface
{
    private PhoneCard $phoneCard;
    private WalletRepositoryInterface $wallet;
    private WithdrawRepositoryInterface $withdraw;
    private History $history;
    public function __construct(PhoneCard $phoneCard, WalletRepositoryInterface $wallet, WithdrawRepositoryInterface $withdraw, History $history)
    {
        $this->phoneCard = $phoneCard;
        $this->wallet = $wallet;
        $this->withdraw = $withdraw;
        $this->history = $history;
    }

    public function buyCard($data)
    {

        $card = $this->phoneCard->where('card_type', $data['cardtype'])
            ->where('card_denomination', $data['card_denomination'])
            ->where('is_valid', 1)
            ->limit($data['amount'])
            ->get();

        if ($card->count() < $data['amount']) {
            return false;
        }

        $card->each(function ($item) {
            $item->is_valid = 0;
            $item->save();
        });
        //update wallet
        $wallet = $this->wallet->getWalletByUserId($data['user_id']);
        $wallet->balance -= $data['amount'] * $data['card_denomination'];
        $wallet->save();
        //insert to history
        $this->history->create([
            'user_id' => $data['user_id'],
            'amount' => $data['amount'] * $data['card_denomination'],
            'type' => 4,
            'created_date' => date('Y-m-d H:i:s'),
        ]);
        return $card;
    }

  
}