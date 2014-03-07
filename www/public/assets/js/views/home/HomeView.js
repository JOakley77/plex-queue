define([
    'backbone',
    'text!templates/movie/listTemplate.html'
], function( Backbone, listTemplate ) {
    var homeView = Backbone.View.extend({

        /**
         * Element
         * 
         * All views have a DOM element at all times (the el property), whether they've already been 
         * inserted into the page or not. In this fashion, views can be rendered at any time, and 
         * inserted into the DOM all at once, in order to get high-performance UI rendering with as 
         * few reflows and repaints as possible. this.el is created from the view's tagName, className, 
         * id and attributes properties, if specified. If not, el is an empty div.
         */
        el : $( '#main-content' ),
        
        /**
         * Event delegation
         *
         * Uses jQuery's on function to provide declarative callbacks for DOM events within a view.
         */
        events : {
            
        },

        /**
         * Template
         *
         * While templating for a view isn't a function provided directly by Backbone, it's often a nice 
         * convention to define a template function on your views. In this way, when rendering your view, 
         * you have convenient access to instance data. For example, using Underscore templates:
         */
        // template : _.template( '<p>Template rendered</p>' ),

        /**
         * Initializer
         *
         * If the view defines an initialize function, it will be called when the view is first created.
         * If you'd like to create a view that references an element already in the DOM, pass in the 
         * element as an option: new View({el: existingElement})
         */
        initialize : function() {
            var self = this;

            $( '.btn-refresh-plex' ).on( 'click', function( e ) {
                e.preventDefault();

                self.updateFromPlex();

                return false;
            });
            // this.delegateEvents();
            // $.ajax({
            //     url         : '/getMovies',
            //     type        : 'get',
            //     dataType    : 'json'
            // })
            // .done( function( res ) {
            //     console.log( res );
            // });
        },

        /**
         * Render page
         *
         * The default implementation of render is a no-op. Override this function with your code that 
         * renders the view template from model data, and updates this.el with the new HTML. A good 
         * convention is to return this at the end of render to enable chained calls.
         */
        render : function() {

            var self = this;

            $.ajax({
                url         : '/getMovies',
                type        : 'get',
                dataType    : 'json'
            })
            .done( function( res ) {
                var compiledTemplate = _.template( listTemplate, {
                    movies : res
                } );

                self.$el.html( compiledTemplate );

                $( document ).foundation( 'reflow' );
            });

            // this.$el.html( _.template( '<p><%= movies.title %></p>', {
            //     movies : res
            // } ) );

            // this.$el.html( this.template );
        },

        updateFromPlex : function() {
            $.ajax({
                url     : '/updateFromPlex',
                type    : 'get',
                dataType: 'json'
            })
            .done( function( res ) {

            });
        }
    });

    return homeView;
});