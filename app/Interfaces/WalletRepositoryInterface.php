<?php

namespace App\Interfaces;


interface WalletRepositoryInterface
{
    public function createWallet($id);

    public function deposit($amount, $id);

    public function getWalletByUserId($id);

    public function transfer($data);
}