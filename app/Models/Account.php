<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
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

    public function getAccountByUsername($username)
    {
        return $this->where('username', $username)->whereNull('deleted_date')->first();
    }
}
