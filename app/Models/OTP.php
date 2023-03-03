<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $table = 'tbl_otp_transfer';

    protected $fillable = [
        'otp',
        'receiver_id',
        'sender_id',
        'created_date',
    ];

    public $timestamps = false;

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
