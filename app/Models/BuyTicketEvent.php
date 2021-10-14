<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyTicketEvent extends Model
{
    use HasFactory;

    protected $table = 'buy_ticket_event';

    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_id',
        'name',
        'email',
        'phone_number',
    ];

    public function event_user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket()
    {
        return $this->belongsTo(EventTicket::class, 'ticket_id');
    }
}
