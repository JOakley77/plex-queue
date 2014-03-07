define([
    'backbone',
    'views/home/HomeView'
], function( Backbone, HomeView ) {
    
    /**
     * Define application routes
     * 
     */
    var AppRouter = Backbone.Router.extend({
        routes: {
            ''          : 'defaultAction',
            'alerts'    : 'foundationAlerts',
            'block_grid': 'fondationBlockGrid'
        }
    });

    /**
     * Get/set display platform
     * 
     * @param  {string}     os operating platform
     * @return {Boolean}    is mobile = true / is desktop = false
     */
    var isMobile = function( os ) {
        var os_types = { 
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (
                    isMobile( 'Android' ) || isMobile( 'BlackBerry' ) || isMobile( 'iOS' ) || isMobile( 'Opera' ) || isMobile( 'Windows' )
                );
            }
        };

        if ( os_types[ os ] || os_types[ os ] !== undefined )
            return true;
        else return false;
    };

    /**
     * Initializer
     *
     * Initializes Backbone routes as defined above
     */
    var initialize = function() {

        var app_router = new AppRouter;

        // mobile check
        this.is_mobile = isMobile();

        // default route
        app_router.on( 'route:defaultAction', function() {
            var homeView = new HomeView();
            homeView.render();
        });

        Backbone.history.start();
    };

    return {
        initialize: initialize
    };
});