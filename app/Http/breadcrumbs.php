<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push(trans('master.countries'), route('home'));
});

// Home > [Region]
Breadcrumbs::register('region', function($breadcrumbs, $region)
{
    $breadcrumbs->parent('home');
    if ($region->parent) {
        $breadcrumbs->push($region->parent->name, route('region', $region->parent->id));
    }
    $breadcrumbs->push($region->name, route('region', $region->id));
});

// Home > [Region] -> [City]
Breadcrumbs::register('city', function($breadcrumbs, $city)
{
    $breadcrumbs->parent('region', $city->region);
    $breadcrumbs->push($city->name, route('city', $city->id));
});
