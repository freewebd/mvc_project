<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <h1><?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="meta"><?php echo htmlspecialchars($data['author'], ENT_QUOTES); ?><div>
                                <p><img src="/public/img/<?php echo htmlspecialchars($data['image'], ENT_QUOTES); ?>" </p>
                                <p><?php echo htmlspecialchars($data['content'], ENT_QUOTES); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>