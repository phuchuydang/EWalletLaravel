<?php

namespace App\Interfaces;


interface OTPRepositoryInterface
{
    public function createOTP($data);

    public function getOTPByUserId($userId);

    public function getInforTransfer($id);
}