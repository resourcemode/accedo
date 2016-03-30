<div id="trending">
  <div class="container text-center">
    <button id="loader" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>Loading...</button>
  </div>

  <div class="clearfix"></div>

  <div class="owl-carousel owl-theme text-center" id="carousel">
    <div ng-repeat="video in media" ng-if="video.images[0].url != '' || video.images[0].url">
      <a href="#[[ video.id ]]" class="movies" data-source="[[ video.contents[0].url ]]">
      <img src="[[ video.images[0].url ]]" alt="Image" class="img-responsive">
      [[ video.title ]]
      </a>
    </div>
  </div>
</div>

