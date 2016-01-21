<?php

namespace App\Contracts;

interface Time
{
    /**
     * Get time data.
     *
     * @return mixed
     */
    public function getTimeByCoordinates($lat, $lng);

}
