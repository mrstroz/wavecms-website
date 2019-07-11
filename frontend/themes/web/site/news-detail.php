<?php

use mrstroz\wavecms\news\models\News;
use mrstroz\wavecms\page\models\Page;
use yii\web\View;

/** @var  View $this */
/** @var Page $page */
/** @var News $news */


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