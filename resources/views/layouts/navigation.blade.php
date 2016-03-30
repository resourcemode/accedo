<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/img/logo/accedo.png" height="30px"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      @if($routeName !== 'login')
      <ul class="nav navbar-nav">
        <li id="homeIndex"><a href="/">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="history"><a href="#" ng-click="onHistory()">History <span class="sr-only">(current)</span></a></li>
        <li id="logout"><a href="#" id="logout">Logout <span class="sr-only">(current)</span></a></li>
      </ul>
      @endif
    </div><!--/.nav-collapse -->
  </div>
</nav>
@section('inlineScripts')
  <script>
    // just get the current route
    window.routeName = "{{ $routeName }}";

    // logout action
    $('#logout').on('click', function() {
      $.ajax({
        url: "/logout",
      }).done(function() {
        swal('Logout', 'Logout successfully', 'success');
        window.setTimeout(function() {
          window.location.href = "/";
        }, 2000);
      });
    });

  </script>
@endsection