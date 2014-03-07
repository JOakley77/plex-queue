define([
    'jquery',
    'underscore',
    'backbone',
    'foundation',
    'router',

    // include common plugins
], function( $, _, Backbone, Foundation, Router ) {
    
    var initialize = function() {

        // Initialize BackBone Routes
        Router.initialize();

        // Initialize Foundation JS
        $( document ).foundation();
    };

    return {
        initialize : initialize
    };
});