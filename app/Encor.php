<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encor extends Model
{
    /**
     * Encor list.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRandom($query)
    {
        return $query->take(5)->orderByRaw('RAND()');
    }
}
