<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/main.css') }}
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="wrapper">
            <header>
                <section id="top-area">
                    <p>Phone orders: 1-800-0000 | Email us: <a href="mailto:office@shop.com">office@shop.com</a></p>
                </section><!-- end top-area -->
                <section id="action-bar">
                    <div id="logo">
                        <a href="#"><span id="logo-accent">e</span>Commerce</a>
                    </div><!-- end logo -->

                    <nav class="dropdown">
                        <ul>
                            <li>
                                <a href="/">Shop by Category {{ HTML::image('img/down-arrow.gif' , 'Shop by Category') }}</a>
                                <ul>
                                    @foreach($catnav as $cat)
                                        <li>{{ HTML::link('e-commerce/public/store/category/'.$cat->id, $cat->name) }}</li>
                                    @endforeach    
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <div id="search-form">
                        {{ Form::open(array('url'=>'store/search' , 'method'=>'get' )) }}
                        {{ Form::text('keyword' , null , array('placeholder'=>'search by keyword' , 'class'=>'search' )) }}
                        {{ Form::submit('Search' , array('class'=>'submit search')) }}
                        {{ Form::close() }}
                    </div><!-- end search-form -->

                    <div id="user-menu">
                        
                        <nav id="signin" class="dropdown">
                            <ul>
                                <li>
                                    <a href="#">{{ HTML::image('img/user-icon.gif' , 'Sign In') }}
                                     Sign In {{ HTML::image('img/down-arrow.gif' , 'Sign In') }}</a>
                                    <ul>
                                        <li><a href="#">Sign In</a></li>
                                        <li><a href="#">Sign Up</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                        <!--
                        <nav class="dropdown">
                            <ul>
                                <li>
                                    <a href="#">
                                    {{ HTML::image('img/user-icon.gif' , 'Andrew Perkins') }}
                                     Andrew Perkins {{ HTML::image('img/down-arrow.gif' , 'Andrew Perkins') }}</a>
                                    <ul>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>-->
                    </div><!-- end user-menu -->

                    <div id="view-cart">
                        <a href="#">
                        {{ HTML::image('img/blue-cart.gif' , 'View Cart') }}    
                    </div><!-- end view-cart -->
                </section><!-- end action-bar -->
            </header>

            @yield('promo')

            @yield('search-keyword')

            <hr />

            <section id="main-content" class="clearfix">
                @if(Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif
                @yield('content') 
            </section><!-- end main-content -->

            <hr />

            @yield('pagination')


            <footer>
                <section id="contact">
                    <h3>For phone orders please call 1-800-000. You<br>can also email us at <a href="mailto:office@shop.com">office@shop.com</a></h3>
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">Sign Up</a></li>
                            <li><a href="#">Order History</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo">
                            <a href="#"><span id="logo-accent">e</span>Commerce</a>
                        </div><!-- end logo -->
                        <p id="store-desc">This is a short description of the store.</p>
                        <p id="store-copy">&copy; 2013 eCommerce. Theme designed by Gautam.</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        {{ HTML::image('img/payment-methods.gif' , 'Supported Payment Methods') }}
                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
