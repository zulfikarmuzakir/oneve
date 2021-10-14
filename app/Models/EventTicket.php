<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EventTicket extends Model
{
    use HasFactory;

    protected $table = "event_tickets";

    protected $fillable = [
        'event_id',
        'ticket_name',
        'ticket_total',
        'ticket_date_start',
        'ticket_date_end',
        'ticket_time_start',
        'ticket_time_end',
        'ticket_type',
        'ticket_price',
        'event_link',
    ];  

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function event_buyer()
    {
        return $this->hasMany(BuyTicketEvent::class);
    }
    
    public function getTicketDateStartAttribute()
    {
        return Carbon::parse($this->attributes['ticket_date_start'])->translatedFormat('d F Y');
    }

    public function getTicketDateEndAttribute()
    {
        return Carbon::parse($this->attributes['ticket_date_end'])->translatedFormat('d F Y');
    }
}
