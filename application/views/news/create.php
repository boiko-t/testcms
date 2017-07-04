<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=uj9t2tk4kmso55idk0yh3y6ev28c6utq9ls7ylyk5k0dklb1"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 600,
        menubar: false,
        plugins: [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>
<div class="container">
    <div class="account-bottom">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" enctype="multipart/form-data">
                <div class="account-top heading">
                    <h3>Create new article</h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" required name="categoryId">
                            <option disabled selected>--Category--</option>
                            <?php
                            foreach ($categories as $key) {
                                $id = $key['categoryId'];
                                $name = $key['name'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <input type="file" name="pictureUrl" id="exampleInputFile">
                    </div>
                </div>
                <div class="address bottom15">
                    <span>Title</span>
                    <input type="text" name="title" value="<?=$title?>">
                </div>
                <textarea name="newsText"></textarea>
                <div class="address bottom15">
                    <div class="col-md-3 col-md-offset-8">
                        <input type="submit" value="Post article">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
