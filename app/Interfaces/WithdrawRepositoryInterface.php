<?php

namespace App\Interfaces;


interface WithdrawRepositoryInterface
{
    public function withdraw($id,$data);
}