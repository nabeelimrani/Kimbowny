<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }
  public function wishlist()
  {
    return $this->belongsToMany(Product::class, 'wishlists');
  }

    /**
     * Get the user who referred this user.
     */
    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
