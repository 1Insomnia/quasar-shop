<?php

namespace App\Helpers;

/**
 * Price
 */
class Price {

    /**
     * formatPrice
     *
     * @param  mixed $price
     * @return void
     */
    public static function formatPrice ($price)
    {
        return number_format($price);
    }
}