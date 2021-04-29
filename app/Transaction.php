<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'paid_by',
        'user_id',
        'amount',
        'extra_data',
        'type',
        'custom_id',
        'paid_for',
        'referral_id',
        'admin_id',
        'city_id',
        'currency',
        'rate',
        'who',
        'note',
        'done_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'done_at' => 'datetime',
    ];

    public function getPrefixAttribute($plus = false)
    {
        $symbol = 1;

        if ($this->who == 'USER') {
            if ($this->type == 'IN') {
                $symbol = 1;
            } elseif ($this->type != 'ERROR') {
                $symbol = -1;
            }
        } else {
            if ($this->type == 'IN') {
                $symbol = -1;
            } elseif ($this->type != 'ERROR') {
                $symbol = 1;
            }
        }

        if ($plus) {
            $symbol = $symbol == 1 ? "+" : "-";
        }

        return $symbol;
    }

    /**
     * @return string
     */
    public function getSymbolAmountAttribute()
    {
        $symbol = $this->getPrefixAttribute() == 1 ? "+" : "-";

        return $symbol . round($this->amount * $this->rate, 2) . " ₼";
    }

    /**
     * @return string
     */
    public function getSymbolAttribute()
    {
        return $this->currency === 'AZN' ? "₼" : "$";
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
