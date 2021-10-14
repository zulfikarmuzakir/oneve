<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'nik',
        'agency_name',
        'person',
        'identity_card',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
