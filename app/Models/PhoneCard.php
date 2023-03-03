<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneCard extends Model
{
    use HasFactory;

    protected $table = 'tbl_phone_card';

    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = false;

    protected $fillable = [
        'card_type',
        'card_serial',
        'card_number',
        'card_denomination',
        'is_valid',
        'created_date',
        'updated_date',
        'deleted_date',
    ];

    protected $casts = [
        'is_valid' => 'boolean',
    ];

    protected $dates = [
        'created_date',
        'updated_date',
        'deleted_date',
    ];

    public function scopeValid($query)
    {
        return $query->where('is_valid', true);
    }
}
