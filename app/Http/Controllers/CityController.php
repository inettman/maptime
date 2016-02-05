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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function search(Request $request)
    {
        $cities = City::searchByName($request->query->get('q'))->get();

        $result = [];
        foreach($cities as $row) {
            $country = isset($row->region->parent->name)?' > '.$row->region->parent->name:'';
            $result[] = [
                'value' => $row->name.' > '.$row->region->name.$country,
                'href' => route('city', ['id'=> $row->id]),
            ];
        }
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
