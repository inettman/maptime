<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     *
     * @var array 
     */
    private $sidebarCities;
    
    public function __construct()
    {
        $this->sidebarCities = [18687, 71711, 7551, 182, 821, 8036, 8622, 64456, 8375, 8375, 8264, 9367, 8170, 9100, 45];
    }
    
    /**
     * Get region
     */
    
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
    
    /**
     * Default query order.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }
    
    /**
     * Sidebar list
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSidebar($query)
    {
        return $query->whereIn('id',$this->sidebarCities)->orderBy('name');
    }
}
