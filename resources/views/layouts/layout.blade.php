@extends('layouts.master')

@section('navbar')
    <ul class="nav navbar-nav">
        <li><a href="{{ route('home') }}">{{ trans('master.all_countries') }}</a></li>
        @foreach ($navbarRegions as $row)
            <li><a href="{{ route('region', array('id'=>$row->id)) }}">{{ $row->name }}</a></li>
        @endforeach
    </ul>
@endsection

@section('search')
    <p>
        <input name="test" id="search" class="form-control input-lg" placeholder="{{ trans('master.search_placeholder') }}" data-href="{{ route('search')}}">
    </p>
@endsection

@section('js')
    @parent
    <script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('sidebar')
    <div class="list-group">
        @foreach ($sidebarCities as $row)
            <a href="{{ route('city', array('id'=>$row->id)) }}" class="list-group-item">{{ $row->name }}</a>
        @endforeach
    </div>
@endsection

@section('encors')
    <h2>{{ trans('master.encors_title') }}</h2>
    <div class="row">
        <ul>
            @foreach ($encors as $row)
                <li>
                    <a href="{{ $row->link }}">{{ $row->name }}</a>
                </li>
            @endforeach
        </ul>
    </div><!--/row-->
    
@endsection




