<?php

namespace App\Repositories;

use App\Interfaces\PhoneCardRepositoryInterface;
use App\Models\PhoneCard;

class PhoneCardRepository implements PhoneCardRepositoryInterface
{
    private PhoneCard $phoneCard;

    public function __construct(PhoneCard $phoneCard)
    {
        $this->phoneCard = $phoneCard;
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

        // $card->each(function ($item) {
        //     $item->is_valid = 0;
        //     $item->save();
        // });
        return $card;
    }

  
}