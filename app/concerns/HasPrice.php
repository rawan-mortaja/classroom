<?php

namespace App\concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPrice
{
    public function price(): Attribute
    {
        return new Attribute(
            get: fn ($price) => $price / 100,
            set: fn ($price) => $price * 100,
        );
    }
}
