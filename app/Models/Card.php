<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    const NOT_CONFIRM = 0;
    const CONFIRM = 1;

    protected $fillable = [
        'user_id', 'password', 'confirm', 'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
