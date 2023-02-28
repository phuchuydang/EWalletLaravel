<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'tbl_wallet';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'balance',
        'created_date',
        'updated_date',
        'deleted_date',
    ];

    public $timestamps = false;

    //one user has one wallet
    public function user()
    {
        return $this->belongsTo(Account::class, 'user_id', 'id');
    }
}
