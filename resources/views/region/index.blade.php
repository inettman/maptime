@extends('layouts.layout')

@section('title', trans('region.title_list'))
@section('description', trans('region.description_list'))

@section('h1', trans('region.title_list'))

@section('content')
    
    <ul class="list-group">
        @foreach ($regions as $region)
            <li class="list-group-item">
                <h4><a href="{{ route('region', array('id'=>$region->id)) }}">{{ $region->name }}</a></h4>
            </li>
        @endforeach
    </ul>
    
@endsection

