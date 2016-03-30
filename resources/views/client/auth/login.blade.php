@extends('layouts.master')

@section('inlineScripts')
  <script src="/js/client/login.js"></script>
@endsection

@section('content')
  <div class="row" ng-controller="LoginController">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 visible-lg visible-md"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="wrapper">
        <form class="form-signin" ng-submit="submit()">
          <h2 class="form-signin-heading text-center">Please login</h2>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" ng-model="login.email" placeholder="Email Address" required="" autofocus="" />
          </div>
          <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="password" ng-model="login.password" placeholder="Password" required=""/>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 visible-lg visible-md"></div>
  </div>
@endsection