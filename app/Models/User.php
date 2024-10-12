<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

use function PHPUnit\Framework\lessThanOrEqual;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

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


    public function getIsActiveAttribute()
    {
        $lastSubscription = $this->LastActiveUserSubscription()->first();
    if (!$lastSubscription) {
        return false;
    }

    $dateNow = Carbon::now();
    $dataExpired =  Carbon::create($this->LastActiveUserSubscription()->expired_date());
    
    return $dateNow->lessThanOrEqualTo($dataExpired);
    }

    public function hasSubscription()
    {
        return $this->isActive;
    }

    public function LastActiveUserSubscription(): HasOne
{
    return $this->hasOne(UserSubscription::class)->where('payment_status', 'paid')->latest();
}   
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
