<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationships
     */

    // Member Information (One-to-One with foreign key user_id)
    public function memberInformation()
    {
        return $this->hasOne(MemberInformation::class, 'user_id');
    }

    // Cart (One-to-One with foreign key user_id)
    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id');
    }

    // Wish List (One-to-One with foreign key user_id)
    public function wishList()
    {
        return $this->hasOne(WishList::class, 'user_id');
    }

    // Orders (One-to-Many with foreign key user_id)
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
