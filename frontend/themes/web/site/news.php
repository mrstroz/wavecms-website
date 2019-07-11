<?php

use mrstroz\wavecms\news\models\News;
use mrstroz\wavecms\page\models\Page;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use mrstroz\wavecms\page\components\helpers\Front;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var View $this */
/** @var Page $page */
/** @var ActiveDataProvider $dataProvider */

?>


<div class="row">
    <div class="col-md-12">
        <h1><?= $page->title; ?></h1>
        <?= $page->text; ?>
    </div>
</div>

<div class="row">
    <?php /** @var News $news */
    foreach ($dataProvider->getModels() as $news): ?>
        <div class="col-md-3">
            <?php $url = Url::to([$page->link . '/' . $news->link]); ?>
            <a href="<?= $url; ?>"><?= Front::img($news->image, false, ['class' => 'img-responsive thumbnail']); ?></a>
            <h3><a href="<?= $url; ?>"><?= $news->title; ?></a></h3>
            <span class="text-muted"><?= $news->create_date; ?></span>
        </div>
    <?php endforeach; ?>
</div>

<hr/>

<?= LinkPager::widget(['pagination' => $dataProvider->pagination]); ?>

