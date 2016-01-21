@extends('layouts.layout')

@section('title', trans('region.title', array('region' => $region->name, 'parent' => isset($region->parent->name)?'('.$region->parent->name.') ':'')))
@section('description', trans('region.description', array('region' => $region->name, 'parent' => isset($region->parent->name)?'('.$region->parent->name.') ':'')))

@section('breadcrumbs', Breadcrumbs::render('region', $region))
@section('h1', trans('region.title', array('region' => $region->name, 'parent' => isset($region->parent->name)?'('.$region->parent->name.') ':'')))

@section('content')
    @if (count($region->childred))
        <h2>{{ $region->name.' '.trans('master.regions') }}</h2>
        <ul class="list-group">
            @foreach ($region->childred as $child)
                <li class="list-group-item">
                    <a href="{{ route('region', array('id'=>$child->id)) }}">{{ $child->name }}</a>
                </li>    
            @endforeach
        </ul>
    @endif 
    @if (count($region->cities))
        <h2>{{ $region->name.' '.trans('master.cities') }}</h2>
        <ul class="list-group">
            @foreach ($region->cities as $city)
                <li class="list-group-item">
                    <a href="{{ route('city', array('id'=>$city->id)) }}">{{ $city->name }}</a>
                </li>    
            @endforeach
        </ul>
    @endif 
@endsection

