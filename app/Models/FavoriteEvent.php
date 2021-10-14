<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteEvent extends Model
{
    use HasFactory;

    protected $table = "favorite_events";

    protected $fillable = [
        'user_id',
        'event_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
