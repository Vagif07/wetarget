<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'customer_id',
        'tags',
    ];

    /**
     * Get the customer that the keyword belongs to.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
