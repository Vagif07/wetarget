<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'ad_type',
        'action_link',
        'width',
        'height',
        'ad_placement',
        'user_id',
        'currency',
        'rate',
        'daily_budget',
        'tags',
        'status',
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
    ];

    /**
     * Get the user that the ad belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return string
     */
    public function getSymbolAttribute()
    {
        return $this->currency === 'AZN' ? "₼" : "$";
    }
}
