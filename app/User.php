<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'website',
        'email',
        'phone_number',
        'description',
        'logo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the customer's keywords.
     */
    public function ads()
    {
        return $this->hasMany('App\Ad');
    }

    /**
     * Get the customer's keywords.
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function getBalanceAttribute()
    {
        $balance = 0;

        $in = $this->transactions()->where('type', 'IN')->get();
        $out = $this->transactions()->where('type', 'OUT')->get();

        if ($in) {
            $inTotal = 0;
            foreach ($in as $value) {
                $inTotal += $value->prefix * $value->amount * $value->rate;
            }

            $outTotal = 0;
            foreach ($out as $value) {
                $outTotal += $value->prefix * $value->amount * $value->rate;
            }
            $balance = $inTotal - $outTotal;
        }

        return $balance . ' ₼';
    }
}
