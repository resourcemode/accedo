@extends('layouts.master')

@section('content')
  <div class="row" ng-init="loadMedia()">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <h1>[[ title ]]</h1>
      <div id="mediaView">
        @include('partials.trending-carousel')
      </div>
      <div id="historyView">
      </div>
    </div>
  <div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      @include('partials.watch-carousel')
    </div>
  </div>
@endsection