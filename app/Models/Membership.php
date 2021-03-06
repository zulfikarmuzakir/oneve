<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = "membership";

    protected $fillable = [
        'user_id',
        'membership_type',
        'start_at',
        'expire_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
