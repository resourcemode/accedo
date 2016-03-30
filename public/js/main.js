/**
 * Load only necessary functions on document ready
 *
 */
$( document ).ready(function() {
    console.log( "App is running!" );

    // fire load keyboard events
    attachKeyBoardEvents();

    // fire carousel
    loadWatchCarousel();

    // load trending carousel in 3 secs
    setTimeout(
        function() {
            // fire carousel for trending videos
            loadTrendingCarousel();

            // fire get video
            loadVideo();

            // hide loader
            $('#loader').addClass('hide').fadeOut('slow');
        }, 3000);

    // add active class
    if (getRouteName()) {
        // $('#' + getRouteName()).addClass('active');
    }
});

/**
 * Get the current route name
 *
 * @returns {string}
 */
var getRouteName = function() {
    return window.routeName;
};

/**
 * Load carousel
 */
var loadTrendingCarousel = function() {
    $('.owl-carousel').owlCarousel({
        items:1,
        merge:true,
        margin:10,
        loop:false,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        responsive:{
            0:{
                items:2,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
};

/**
 * Watch Carousel
 */
var loadWatchCarousel = function() {
    $('.watch').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                loop:false
            }
        }
    });
};

/**
 * Play video
 */
var playVideo = function() {
    var myVideo = 'myVideo';
    $('#' + myVideo).get(0).play();
};

/**
 * Video on video finished action
 */
var onVideoFinished = function() {
    $("#myVideo").bind("ended", function() {
        createHistory();
    });
};

/**
 * Load video
 *
 * This is used to load the video dynamically
 */
var loadVideo = function() {
    $('.movies').on('click', function() {
        var myVideo = $('#myVideo');

        // get the video source
        var src = $(this).attr('data-source');

        $(myVideo).attr('src', src);

        myVideo.src = src;
        myVideo.load();

        playVideo();
        onVideoFinished();
    });
};

/**
 * Create history for every watched movie
 */
var createHistory = function() {
    $('#myVideo').get(0).webkitExitFullScreen();
    $.ajax({
        type: "POST",
        url: "/history",
        data: { movie_id: window.location.hash.substr(1)},
        success: function(msg){
            console.log(msg.data);
        },
        error: function(xhr, textStatus, errorThrown) {
           console.log(responseText, errorThrown, textStatus);
        }
    });
    swal('Thank you for watching', 'Please rate the movie', 'success');
};

/**
 * Keyboard events
 *
 */
var attachKeyBoardEvents = function() {
    var $owl = $( '#carousel' );

    $(document).on('keydown', function( event ) {
        //attach event listener
        if(event.keyCode == 37) {
            $owl.trigger('prev.owl');
        }

        if(event.keyCode == 39) {
            $owl.trigger('next.owl');
        }

        if(event.keyCode == 13) {
            $owl.trigger($(this));
        }
    });
};

/**
 * Get history
 */
var getHistory = function() {
    $.ajax({
        type: "GET",
        url: "/history/user",
        success: function(response) {
            $('#historyView').load("/history",  function() {
                // load trending carousel in 3 secs
                setTimeout(
                    function() {
                        $.each(response.data.entries, function( key, video ) {

                            $('#carousel').append(
                                '<a href="#seven" class="movies">' +
                                '<img src="'+ video.images[0].url +'" alt="Image" class="img-responsive">' +  video.title +
                                '</a>'
                            );
                        });

                        // fire carousel for trending videos
                        loadTrendingCarousel();

                        // fire get video
                        loadVideo();

                        // hide loader
                        $('#loader').addClass('hide').fadeOut('slow');
                    }, 3000);

                console.log('history fetch was performed');
            });

        },
        error: function(responseText, textStatus, errorThrown) {
            console.log(responseText, errorThrown, textStatus);
        }
    });
};