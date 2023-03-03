<?php

namespace App\Repositories;

use App\Interfaces\OTPRepositoryInterface;
use App\Models\OTP;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OTPRepository implements OTPRepositoryInterface
{
    private OTP $otp;

    public function __construct(OTP $otp)
    {
        $this->otp = $otp;
    }

    public function createOTP($data)
    {
        //find all otp of sender, remove
        $this->otp->where('sender_id', $data['sender_id'])->delete();
        $this->otp->create([
            'receiver_id' => (int) $data['receiver_id'],
            'sender_id' => $data['sender_id'],
            'otp' => $data['otp'],
            'created_date' => date('Y-m-d H:i:s'),
        ]);
        return true;
    }

    public function getOTPByUserId($userId)
    {
        return $this->otp->where('sender_id', $userId)->first();
    }

    public function getInforTransfer($id)
    {
        return $this->otp->where('sender_id', $id)->first();
    }
}