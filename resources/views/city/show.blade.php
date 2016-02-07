@extends('layouts.layout')

@section('title', trans('city.title_seo', array('city' => $city->name, 'city_en' => $city->name_en, 'region' => $city->region->name, 'region_parent' => isset($city->region->parent->name)?$city->region->parent->name.', ':'')))
@section('description', trans('city.description', array('city' => $city->name, 'city_en' => $city->name_en, 'region' => $city->region->name, 'region_parent' => isset($city->region->parent->name)?$city->region->parent->name.', ':'')))

@section('breadcrumbs', Breadcrumbs::render('city', $city))
@section('h1', trans('city.title', array('city' => $city->name, 'city_en' => $city->name_en, 'region' => $city->region->name, 'region_parent' => isset($city->region->parent->name)?$city->region->parent->name.', ':'')))
@section('content')
    
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <canvas id="clock" width="280" height="280">
            </canvas>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div id="clock_digital"></div>
            <div class="text-muted">
                <p><strong>{{ trans('time.timezone') }}: </strong>{{ $time->getTimezoneId() }}</p>
                <p><strong>{{ trans('time.sunrise') }}: </strong>{{ $time->getSunrise()->format('H:i (d.m.Y)') }}</p>
                <p><strong>{{ trans('time.sunset') }}: </strong>{{ $time->getSunset()->format('H:i (d.m.Y)') }}</p>
                <p><strong>{{ trans('master.coordinates') }}: </strong>{{ trans('master.latitude') }} {{ $city->latitude }}, {{ trans('master.longitude') }} {{ $city->longitude }}</p>
            </div>
        </div>
    </div>
    @include('bookmarks.original')
    <h2>{{ trans('city.title_map', array('city' => $city->name)) }}</h2>
    @include('banners.adsense')
    <div class="map_container">
        <div id="map"></div>
    </div>
    @include('banners.adsense')
    
    @section('css')
        @parent
        <link href="{{ asset('css/clock/jqClock.css') }}" rel="stylesheet">
        <link href="{{ asset('css/clock/digitalClock.css') }}" rel="stylesheet">
    @endsection
    
    @section('js')
        @parent
        <script src="{{ asset('js/clock/clock.js') }}"></script>
        <script src="{{ asset('js/clock/digitalClock.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeqd1a6EuWkLvgAti5MdwRtQqTaIdZ27U&callback=initMap"></script>
        
        <script type="text/javascript">
            var canvas = document.getElementById("clock");
            var ctx = canvas.getContext("2d");
            var radius = canvas.height / 2;
            ctx.translate(radius, radius);
            radius = radius * 0.90;
            jQuery(document).ready(function() {
                drawClock(new Date({{$time->getTime()->format('Y, m, d, H, i, s')}}));
            });
        </script>
        
        <script type="text/javascript">
            jQuery(document).ready(function() {
                startTime(new Date({{$time->getTime()->format('Y, m, d, H, i, s')}}));
            });
        </script>
        
        <script type="text/javascript">
            var map;
            function initMap() {
              map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{ $city->latitude }}, lng: {{ $city->longitude }}},
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.HYBRID
              });
            }
        </script>
    @endsection

@endsection

