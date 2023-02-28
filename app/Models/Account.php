<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_account';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'fullname',
        'address',
        'birthday',
        'first_identity_card',
        'second_identity_card',
        'is_actived',
        'is_verified',
        'is_abnormal',
        'created_date',
        'updated_date',
        'deleted_date',
    ];

    //one user has one wallet
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }
}
