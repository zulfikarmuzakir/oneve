<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
// use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner',
        'event_name',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
        'price',
        'description',
        'user_id',
        'max_ticket_user',
        'status',
        'category_id',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event_tickets()
    {
        return $this->hasMany(EventTicket::class);
    }

    public function event_buyer()
    {
        return $this->hasMany(BuyTicketEvent::class);
    }

    public function favorited_event()
    {
        return $this->hasMany(FavoriteEvent::class);
    }

    public function getDateStartAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('d F Y');
    }

    public function getDateEndAttribute()
    {
        return Carbon::parse($this->attributes['date_end'])->translatedFormat('d F Y');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
