<!DOCTYPE html>
<html lang="en" ng-app="Accedo">
<head>
  <!-- start head -->
  @include('layouts.head')
  <!-- end head -->
</head>

<body ng-controller="MediaController">
  <div class="navigation">
    <!-- menu -->
    @include('layouts.navigation')
    <!-- end menu-->
  </div>

  <div class="container">
    <div class="row">
      <!-- start content -->
      <div class="col-xs-12 col-sm-12 col-md-12">
        @yield('content')
      </div>
      <!-- end content -->
    </div>

    <!-- start footer -->
    @include('layouts.footer')
    <!-- end footer -->
  </div>

  <!-- start bottom scripts -->
   @include('layouts.scripts')
  <!-- end bottom scripts -->
</body>
</html>
