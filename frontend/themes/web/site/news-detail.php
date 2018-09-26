<?php

/** @var $this yii\web\View */

/** @var \mrstroz\wavecms\page\models\Page $page */
/** @var \mrstroz\wavecms\news\models\News $news */

?>


<div class="row">
    <div class="col-md-12">
        <h1><?= $news->title; ?></h1>
        <span class="text-muted"><?= $news->create_date; ?></span>
        <article>
            <?= $news->text; ?>
        </article>
    </div>
</div>