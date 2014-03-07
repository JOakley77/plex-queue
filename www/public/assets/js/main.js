require.config({

    /* Paths
    ======================== */
    paths   : {

        // You can include a static template path below to minimize
        // the amount of "text" you need to write when using requirejs-text
        // templates.
        templates           : '../../templates',
        
        // Core Libraries
        jquery              : 'libs/jquery/dist/jquery.min',
        underscore          : 'libs/underscore/underscore',
        backbone            : 'libs/backbone/backbone',
        foundation          : 'libs/foundation/js/foundation.min',

        // Additional Libraries
        fastclick           : 'libs/fastclick/lib/fastclick',

        // RequireJS Plugins
        text                : 'libs/requirejs-text/text',

        // jQuery Plugins
        // jquery_appear       : 'libs/plugins/jquery/appear/jquery.appear',
        // jquery_easing       : 'libs/plugins/jquery/easing/jquery.easing.1.3',
        // jquery_flexslider   : 'libs/plugins/jquery/flexslider/jquery.flexslider',
        // jquery_hammer       : 'libs/plugins/jquery/hammer/jquery.hammer',
        // jquery_hoverdir     : 'libs/plugins/jquery/hoverdir/jquery.hoverdir',
        // jquery_jpreloader   : 'libs/plugins/jquery/jpreloader/jquery.jpreloader',
        // jquery_lavalamp     : 'libs/plugins/jquery/lavalamp/jquery.lavalamp.min',
        // jquery_magnific     : 'libs/plugins/jquery/magnific/jquery.magnific-popup.min',
        // jquery_mixitup      : 'libs/plugins/jquery/mixitup/mixitup',
        // jquery_nav          : 'libs/plugins/jquery/nav/jquery.nav',
        // jquery_owl          : 'libs/plugins/jquery/owl/owl.carousel',
        // jquery_parallax     : 'libs/plugins/jquery/parallax/jquery.parallax-1.1.3',
        // jquery_scrollto     : 'libs/plugins/jquery/scrollto/jquery.scrollTo-1.4.2-min',
        // jquery_smoothscroll : 'libs/plugins/jquery/smoothscroll/jquery.smoothscroll',
        // jquery_superslides  : 'libs/plugins/jquery/superslides/jquery.superslides',
    },

    /* Shims
    ======================== */
    shim: {

        // piggy back common (needed) libs with Backbone
        backbone    : {
            deps        : [ 'jquery', 'underscore', 'foundation' ],
            exports     : 'Backbone'
        },

        foundation  : {
            deps        : [ 'jquery', 'fastclick' ],
            exports     : 'Foundation'
        }

        // shim jQuery plugins
        // jquery_appear       : [ 'jquery' ],
        // jquery_easing       : [ 'jquery' ],
        // jquery_flexslider   : [ 'jquery' ],
        // jquery_hammer       : [ 'hammer', 'jquery' ],
        // jquery_hoverdir     : [ 'jquery' ],
        // jquery_jpreloader   : [ 'jquery' ],
        // jquery_lavalamp     : [ 'jquery' ],
        // jquery_magnific     : [ 'jquery' ],
        // jquery_mixitup      : [ 'jquery' ],
        // jquery_nav          : [ 'jquery' ],
        // jquery_owl          : [ 'jquery' ],
        // jquery_parallax     : [ 'jquery' ],
        // jquery_scrollto     : [ 'jquery' ],
        // jquery_smoothscroll : [ 'jquery' ],
        // jquery_superslides  : [ 'jquery' ],
    }
});

require([
    'app',
], function( App ){
    App.initialize();
});