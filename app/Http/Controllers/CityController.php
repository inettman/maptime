<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Time;

class CityController extends Controller
{
    /**
     *
     * @var Time 
     */
    private $time;
    
    /**
     * 
     * @param Time $time
     */
    public function __construct(Time $time) {
        $this->time = $time;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::ordered()->find($id);

        $time = $this->time->getTimeByCoordinates($city->latitude, $city->longitude);

        return view('city.show', ['city' => $city, 'time' => $time]);
    }
}
