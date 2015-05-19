<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/27/15
 * Time: 2:56 AM
 */


$assets = [

    // common config
    // folder base of asset
    'base' => '', // blank  = root folder web
    // export path ( not incude file name)
    'export' => 'assets',
    // name ui file ( css ) - no include extension
    'uiName' => 'minify',
    // name ux file ( js ) - no include extension
    'uxName' => 'minify',

    // list files included
    'dependencies' => [
        /**
         * LESS js
         * Dev mode only
         */
        'lessjs' => [
            "folder" => 'uxui/less.js/dist',
            "js" => "less.js",
            "dev" => true // set dev property = true for exclude from minify file
        ],
        /**
         * MODERNIZR
         * detect browser's features
         */
        'modernizr' => [
            'folder' => 'uxui/modernizr',
            'js' => 'modernizr.js'
        ],

        /**
         * jQuery library
         */
        'jQuery' => [
            'folder' => 'uxui/jquery/dist',
            'js' => 'jquery.js'
        ],

        /**
         * Underscore library
         */
        'underscore' => [
            'folder' => 'uxui/underscore',
            'js' => 'underscore.js'
        ],

        /**
         * Backbone Framework
         */
        'backbone' => [
            'folder' => 'uxui/backbone',
            'js' => 'backbone.js'
        ],

        /**
         * Backbone module
         * support build dynamic property Model
         * ( like mutator in laravel's Model )
         */
        'backbone.mutators' => [
            'folder' => 'uxui/backbone.mutators/src',
            'js' => 'backbone.mutators.js',
        ],

        /**
         * BOOSTRAP pack
         * kick start css & js pack
         */
        'bootstrap' => [
            'folder' => 'uxui/bootstrap/dist',
            'js' => 'js/bootstrap.min.js',
            'css' => 'css/bootstrap.min.css'
        ],

        /**
         * FONT AWESOME
         * font icon pack
         */
        'font-awesome' => [
            'folder' => 'uxui/font-awesome',
            'css' => 'css/font-awesome.min.css'
        ],

        'tobacco' => [
            'folder' => 'themes/tobacco/assets',
            'css' => 'cover.css'
        ]

    ]

];

return $assets;