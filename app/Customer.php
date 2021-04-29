<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'device',
        'ip_address',
        'referrer',
    ];

    /**
     * Get the customer's keywords.
     */
    public function keywords()
    {
        return $this->hasMany('App\Keyword');
    }
}
