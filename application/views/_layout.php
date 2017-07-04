<!DOCTYPE HTML>
<html>
<head>
    <title>Your Mag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="/common/css/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Theme files -->
    <link href="/common/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/common/css/style.css" rel='stylesheet' type='text/css' />
    <script src="/common/js/jquery.min.js"> </script>
    <script type="text/javascript" src="/common/js/move-top.js"></script>
    <script type="text/javascript" src="/common/js/easing.js"></script>
    <script src="/common/js/script.js"></script>
    <script type="text/javascript" src="/common/js/bootstrap-3.1.1.min.js"></script>
    <link rel="stylesheet" href="/common/css/flexslider.css" type="text/css" media="screen" />
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
</head>
    <body>
    <header class="header" id="home">
        <div class="content white">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http:\\cms"><h1>Your<span> Magazine</span></h1> </a>
                    </div>
                    <!--/.navbar-header-->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                                echo '<li><a href="http:\\home\contact">Contact us</a></li>';
                                if(!\application\core\Auth::CheckAuth()){
                                    echo '<li><a href="http:\\account\login">Login</a></li>
                                          <li><a href="http:\\account\register">Register</a></li>';
                                }else
                                    echo '<li><a href="http:\\account">My Account</a></li>
                                          <li><a href="http:\\account\logout">Log out</a></li>';
                            ?>
                        </ul>
                    </div>
                    <!--/.navbar-collapse-->
                    <!--/.navbar-->
                </div>
            </nav>
        </div>
    </header>
        <section><?=$content?></section>
    <footer class="copyright">
        <p>&copy; 2015 Motive Mag. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
    </footer>
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    <div id="errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Error</h4>
                </div>
                <div class="modal-body">
                    <p id="error-modal-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="delete-button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>