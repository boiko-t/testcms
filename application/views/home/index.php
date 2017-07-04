<div class="banner">
    <div class="container">
        <div class="banner-inner">
            <div class="callbacks_container">
                <ul class="rslides callbacks callbacks1" id="banner-slider">
                    <li class="callbacks1_on" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>BE AWARE OF THE LATEST NEWS</h3>
                            <p>We'll help you out here</p>
                        </div>
                    </li>
                    <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>FANTASTIC MAGAZINE</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                    <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>WHAT IS LIKE TO READ MUCH</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--banner-Slider-->
            <script src="/common/js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                    // Slideshow 4
                    $("#banner-slider").responsiveSlides({
                        auto: true,
                        pager: true,
                        nav:false,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                            $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                        }
                    });

                });
            </script>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="container">
        <div class="mag-inner">
            <div class="col-md-8 mag-innert-left">
                <!--//latest-articles-->
                <div class="latest-articles">
                    <h3 class="tittle">Latest Articles</h3>
                    <div class="world-news-grids">
                        <?php
                        use application\core\FileManager;

                        foreach ($latestNews as $elem)
                                echo '<div class="world-news-grid">
                                        <img src="'.FileManager::GetImageHtmlPath($elem['pictureUrl']).'" />
                                        <h4>'.$elem['title'].'</h4>
                                        <a class="read" href="http://cms/news/read/'.$elem['newsId'].'">Read More</a>
                                    </div>'
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="latest-articles">
                    <h3 class="tittle">In case you missed it</h3>
                    <div class="world-news-grids">
                        <?php
                        foreach ($randomNews as $elem)
                            echo '<div class="world-news-grid">
                                        <img src="'.FileManager::GetImageHtmlPath($elem['pictureUrl']).'" />
                                        <h4>'.$elem['title'].'</h4>
                                        <a class="read" href="http://cms/news/read/'.$elem['newsId'].'">Read More</a>
                                    </div>'
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--//articles-->
            </div>
            <div class="col-md-4 mag-inner-right">

                <div class="connect">
                    <h4 class="side" >STAY CONNECTED</h4>
                    <ul class="stay">
                        <li class="c5-element-facebook"><a href="#"><span class="icon"></span><h5>+1</h5><span class="text">Follow</span></a></li>
                        <li class="c5-element-twitter"><a href="#"><span class="icon1"></span><h5>+1</h5><span class="text">Follow</span></a></li>
                        <li class="c5-element-gg"><a href="#"><span class="icon2"></span><h5>+1</h5><span class="text">Follow</span></a></li>
                        <li class="c5-element-dribble"><a href="#"><span class="icon3"></span><h5>+1</h5><span class="text">Follow</span></a></li>

                    </ul>
                </div>
                <div class="modern">
                    <h4 class="side">Popular category</h4>
                    <div id="example1">
                        <ul class="td-pb-padding-side">
                            <?php
                            foreach ($popularCategories as $elem)
//                                echo '<li><a href="http://cms/categories/index/'.$elem['categoryId'].'">'.$elem['name'].'<span class="td-cat-no">'.$elem['newsCount'].'</span></a></li>'
                                echo '<li><a href="#">'.$elem['name'].'<span class="td-cat-no">'.$elem['newsCount'].'</span></a></li>'
                            ?>
                        </ul>
                    </div>
                    <!-- requried-jsfiles-for owl -->
                    <script src="/common/js/owl.carousel.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#owl-demo").owlCarousel({
                                items :1,
                                lazyLoad : true,
                                autoPlay : false,
                                navigation : true,
                                navigationText :  true,
                                pagination : false,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems: 2
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- //requried-jsfiles-for owl -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--//end-mag-inner-->
    </div>
</div>