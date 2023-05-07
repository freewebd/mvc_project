<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($list)) : ?>
                            <p>Новини відсутні</p>
                        <?php else : ?>
                            <table class="table">
                                <tr>
                                    <th>Зображення</th>
                                    <th>Заголовок, час публікації</th>
                                    <th>Опібліковано</th>
                                    <th>Автор</th>
                                    <th>Редагувати, видалити</th>
                                </tr>
                                <?php foreach ($list as $val) : ?>
                                    <tr>
                                        <td><img src="/public/img/trumb-<?php echo $val['image']; ?>"></td>
                                        <td>
                                            <div><a href="/news/show/<?php echo $val['id']; ?>"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></a></div>
                                            <div><?php echo htmlspecialchars($val['date'], ENT_QUOTES); ?></div>
                                        </td>
                                        <td><?php echo htmlspecialchars($val['published'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['author'], ENT_QUOTES); ?></td>
                                        <td><a href="/news/edit/<?php echo $val['id']; ?>" class="btn btn-primary btn-block">Редактировать</a>
                                            <a href="/news/delete/<?php echo $val['id']; ?>" class="btn btn-danger btn-block">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; 
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>