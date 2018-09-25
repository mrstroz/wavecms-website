<?php

use mrstroz\wavecms\page\components\helpers\Front;

/* @var $this yii\web\View */
/** @var \mrstroz\wavecms\page\models\Page $page */

?>

<div class="jumbotron">
    <h1><?= $page->title; ?></h1>
    <p class="lead"><?= $page->text; ?></p>
</div>

<?php if ($grid = $page->grid): ?>
    <div class="row">
        <?php foreach ($grid as $item): ?>
            <div class="col-lg-4">
                <h2><?= $item->title; ?></h2>

                <?= $item->text; ?>

                <p>
                    <?= Front::link($item, $item->title, ['class' => 'btn btn-default'],[
                        'page_id' => 'link_page_id',
                        'page_url' => 'link_page_url',
                        'page_blank' => 'link_page_blank'
                    ]); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

