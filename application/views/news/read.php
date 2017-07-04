<div class="container">
    <?php
        if (\application\core\Auth::IsUserAdmin())
            echo '<div class="row top15">
                    <div class="col-md-offset-8 col-md-1">
                        <a href="http://cms/news/edit/'.$newsId.'" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-md-1">
                        <a href="http://cms/news/delete/'.$newsId.'" class="btn btn-danger">Delete</a>
                    </div>
                </div>'
    ?>
    <div class="account-top heading col-md-offset-4">
        <h3><?=$title?></h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6 article-read-picture">
                <img src="<?=$pictureUrl?>" alt="cover picture">
            </div>
            <?=$newsText?>
        </div>
    </div>
    <div class="row small">
        <div class="col-md-4 col-md-offset-2">
            <p></p>
        </div>
        <div class="col-md-4">
            <p class="text-right"><?=$creationDate?></p>
        </div>
    </div>
</div>