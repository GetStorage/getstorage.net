<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>
        @section('title')
        Storage
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- @todo: fill with your company info or remove -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">

    <!-- Flexslider -->
    <link href="/assets/css/flexslider.css" rel="stylesheet">

    <!-- Theme style -->
    <link href="/assets/css/theme-style.css" rel="stylesheet">

    <!--Your custom colour override-->
    <link href="/assets/css/colour-blue.css" id="colour-scheme" rel="stylesheet">

    <!-- Your custom override -->
    <link href="/assets/css/custom-style.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
    <link rel="shortcut icon" href="/assets/img/icons/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/img/icons/114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/img/icons/72x72.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/img/icons/default.png">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300|Rambla|Calligraffitti' rel='stylesheet'
          type='text/css'>
</head>

<body class="page page-index-static">
<div id="navigation" class="wrapper">
    <div class="navbar navbar-static-top">

        <!--Header & Branding region-->
        <div class="header">
            <div class="header-inner container">
                <div class="row-fluid">
                    <div class="span8">
                        <!--branding/logo-->
                        <a class="brand" href="{{URL::to('/')}}" title="Home">
                            <h1><span>Storage</span></h1>
                        </a>
                        <div class="slogan">Totally awesome file hosting</div>
                    </div>

                    <!--header rightside-->
                    <div class="span4">
                        <div class="social-media pull-right">
                            <a href="https://twitter.com/GetStorage" title="Follow us on Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="http://blog.getstorage.net/" title="Read our blog on Tumblr" target="_blank"><i class="icon-book"></i></a>
                            <a href="https://www.statuscake.com/public/site/37016" title="Site Uptime and Status" target="_blank"><i class="icon-bar-chart"></i></a>
                            <a href="https://github.com/GetStorage/getstorage.net" title="Open source on GitHub!" target="_blank"><i class="icon-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-inner">

                <!--mobile collapse menu button-->
                <a class="btn btn-navbar pull-left" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>

                <!--user menu-->
                <ul class="nav user-menu pull-right">
                    @if(!Sentry::check())
                    <li>{{HTML::linkAction('AccountController@getRegister', 'Sign Up', null, array('class' => 'btn btn-primary signup'))}}</li>
                    <li>{{HTML::linkAction('AccountController@getLogin', 'Login', null, array('class' => 'btn btn-primary login'))}}</li>
                    @else
                    @if(Sentry::getUser()->inGroup(Sentry::getGroupProvider()->findByName('Admins')))
                    <li>{{HTML::linkAction('AdminHomeController@getIndex', 'Admin', null, array('class' => 'btn btn-danger'))}}</li>
                    <li class="divider-vertical"></li>
                    @endif
                    <li>{{HTML::linkAction('UserHomeController@getIndex', 'Panel', null, array('class' => 'btn btn-primary signup'))}}</li>
                    <li>{{HTML::linkAction('AccountController@getLogout', 'Logout', null, array('class' => 'btn btn-primary login'))}}</li>
                    @endif
                </ul>

                <!--everything within this div is collapsed on mobile-->
                <div class="nav-collapse collapse">

                    <!--main navigation-->
                    <ul class="nav" id="main-menu">
                        <li class="home-link"><a href="{{URL::to('/')}}"><i class="icon-home hidden-phone"></i><span class="visible-phone">Home</span></a></li>
                        <li>{{HTML::linkAction('DocsController@getApps', 'Apps', null, array('class' => 'menu-item'))}}</li>
                        <li>{{HTML::linkAction('DocsController@getApi', 'Api', 'v2', array('class' => 'menu-item'))}}</li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        @yield('content')
    </div>
</div>
{{--
<div id="content-below" class="wrapper">
    <div class="container">
        <div class="row-fluid">
            <div class="upsell"> <small class="muted">99.9% Uptime <span class="spacer">//</span> Free upgrade assistence <span class="spacer">//</span> 24/7 Support <span class="spacer">//</span> Plans from $19.99/month <span class="spacer">//</span> </small> <a href="pricing.htm" class="btn btn-primary">Start your Free Trial Today! <i class="icon-arrow-right"></i></a> </div>
        </div>
    </div>
</div>
--}}

<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="span3 col">
                <div class="block contact-block">
                    <!--@todo: replace with company contact details-->
                    <h3>Contact Us</h3>
                    <address>
                        <p><abbr title="IRC"><i class="icon-group"></i></abbr> irc.esper.net #storage</p>
                        <p><abbr title="Email"><i class="icon-envelope"></i></abbr> help@getstorage.net</p>
                    </address>
                </div>
            </div>
            <div class="span5 col">
                <div class="block">
                    <h3>About Us</h3>
                    <p>Storage is an awesome mixture of file hosting, and a filesystem for the web. </p>
                </div>
            </div>
            <div class="span4 col">
                <div class="block newsletter">
                    <h3>Placeholder</h3>
                    <p>Something will go here in the future.</p>

                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div id="toplink"><a href="#top" class="top-link" title="Back to top">Back To Top <i class="icon-chevron-up"></i></a></div>
            <!--@todo: replace with company copyright details-->
            <div class="subfooter">
                <div class="span6">
                    <p>Copyright 2013 &copy; <a href="http://axxim.net/">Axxim, LLC</a></p>
                </div>
                <div class="span6">
                    <ul class="inline pull-right">
                        <li>{{HTML::linkAction('DocsController@getTerms', 'Terms')}}</li>
                        <li>{{HTML::linkAction('DocsController@getPrivacy', 'Privacy')}}</li>
                        <li>{{HTML::linkAction('DocsController@getLegal', 'Legal')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Scripts -->
<script src="/assets/js/jquery.js"></script>


<script src="/assets/js/boostrap.min.js"></script>

<!--Non-Bootstrap JS-->
<script src="/assets/js/jquery.quicksand.js"></script>
<script src="/assets/js/jquery.flexslider-min.js"></script>

<!--Custom scripts mainly used to trigger libraries -->
<script src="/assets/js/script.js"></script>
</body>
</html>
