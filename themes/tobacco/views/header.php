<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Thuoc Tau Guide Site</title>

    <!--Font Open Sans-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300&subset=latin,vietnamese' rel='stylesheet' type='text/css'>

    <?php if (ENVIRONMENT == 'development'): ?>
        <link rel="stylesheet" href="/uxui/font-awesome/css/font-awesome.css"/>
        <link rel="stylesheet" href="/uxui/bootstrap/dist/css/bootstrap.css"/>

        <link rel="stylesheet/less" type="text/css" href="/themes/tobacco/assets/style.less"/>

        <script>
            less = {
                env: "development",
                async: false,
                dumpLineNumbers: 'comments',
                logLevel: 1
            };
        </script>

        <script type="text/javascript" src="/uxui/less.js/dist/less.js"></script>
        <script type="text/javascript" src="/uxui/modernizr/modernizr.js"></script>
        <script type="text/javascript" src="/uxui/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="/uxui/jkit/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/uxui/jkit/jquery.jkit.1.2.16.js"></script>
        <script type="text/javascript" src="/uxui/underscore/underscore.js"></script>
        <script type="text/javascript" src="/uxui/backbone/backbone.js"></script>
        <script type="text/javascript" src="/uxui/backbone.mutators/backbone.mutators.js"></script>
        <script type="text/javascript" src="/uxui/bootstrap/dist/js/bootstrap.js"></script>

        <script type="text/javascript" src="/themes/tobacco/assets/ux/app.js"></script>

    <?php else: ?>
        <script type="text/javascript" src="none"></script>
    <?php endif; ?>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<nav class="navbar navbar-inverse navbar-fixed-top mbn" id="menu-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" style="padding-top: 0">
                <ion:page:static:logo:items:logo-file:medias id="static" limit="1" type="picture" width="200">
                    <img src="<ion:media:src/>" alt="Generali VN" class="img-responsive" width="200px"/>
                </ion:page:static:logo:items:logo-file:medias>
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ion:tree_navigation active_class="active" tag="ul" id="my_nav" class="nav navbar-nav navbar-right" depth="2" />
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
