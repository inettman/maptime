<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Region;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $regions = Region::country()->ordered()->get();
        
        return view('region.index', ['regions' => $regions]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $region = Region::ordered()->find($id);

        return view('region.show', ['region' => $region]);
    }

}
