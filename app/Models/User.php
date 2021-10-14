<?php

namespace App\Models;

use App\Http\Controllers\BuyEventController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'google_id',
        'email',
        'password',
        'seller_id',
        'buyer_id',
        'avatar',
        'roles',
        'login_type',
        'slug_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function favorited_event()
    {
        return $this->hasMany(FavoriteEvent::class);
    }

    public function event_buyer()
    {
        return $this->hasMany(BuyTicketEvent::class);
    }

    public function order_data()
    {
        return $this->hasMany(Order::class);
    }
}
