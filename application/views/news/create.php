<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/news/create" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3" type="text" name="content" id="content-form"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Зображення</label>
                                <input class="form-control" type="file" name="image">
                            </div> 
                            <div class="form-group">
                                <label>Автор</label>
                                <input class="form-control" type="text" name="author">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-control" name="published">
                                <label>Опубліковано</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавити пост</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>