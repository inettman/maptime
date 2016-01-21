<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     *
     * @var array 
     */
    private $navbarRegions;
    
    public function __construct()
    {
        $this->navbarRegions = [110, 150, 15, 19, 111];
    }
    
    /**
     * Scope a query to only include Countries.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCountry($query)
    {
        return $query->where('level', 0);
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
     * Navbar list
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNavbar($query)
    {
        return $query->whereIn('id',$this->navbarRegions)->orderBy('name');
    }
    
    /**
     * Get parent region
     */
    
    public function parent()
    {
        return $this->belongsTo('App\Region', 'parent_id');
    }
    
    /**
     * Get children regions
     */
    public function childred()
    {
        return $this->hasMany('App\Region', 'parent_id')->orderBy('name');
    }
    
    /**
     * Get cities
     */
    
    public function cities()
    {
        return $this->hasMany('App\City')->orderBy('name');
    }
        
}
