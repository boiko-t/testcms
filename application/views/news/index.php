<div class="container">
    <div class="row">
        <?php
        foreach ($news as $elem) {
            echo '<div class="col-md-3 col-lg-4">
                    <div class="card">
                        <img class="img-fluid" src="' . $elem->pictureUrl . '" alt="">
                        <div class="card-block">
                            <div class="news-title">
                                <h5><a href="http://cms/news/read/' . $elem->newsId . '">
                                ' . $elem->title . '</a></h5>
                            </div>
                        </div>
                        </div>
                        </div>';
        }
        ?>

    </div>