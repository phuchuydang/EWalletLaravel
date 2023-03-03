<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'tbl_history';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'balance',
        'description',
        'created_date',
        'updated_date',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'user_id', 'id');
    }
}