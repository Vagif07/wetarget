<?php

namespace App\Http;

class Helper {

    public static function getCurrencyRate($currency)
    {
        
        $rates = [
            'AZN' => 1,
            'USD' => 1.7,
        ];

        return (isset($rates[$currency]) ? $rates[$currency] : 1);
    }
}

