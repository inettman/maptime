<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * @var City
     */
    private $cityRepository;

    /**
     * SearchController constructor.
     * @param City $cityRepository
     */
    public function __construct(City $cityRepository) {
        $this->cityRepository = $cityRepository;
    }

    public function searchCities(Request $request)
    {
        $cities = $this->cityRepository->searchByName($request->query->get('q'))->get();

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

}
