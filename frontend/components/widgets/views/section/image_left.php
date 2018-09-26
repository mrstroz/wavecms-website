<?php

use mrstroz\wavecms\page\components\helpers\Front;

/** @var \mrstroz\wavecms\page\models\PageItem $item */

?>

<div class="row">
    <div class="col-md-4">
        <?= Front::img($item->image, false, ['class' => 'img-responsive thumbnail']); ?>
    </div>
    <div class="col-md-8">
        <h3><?= $item->title; ?></h3>
        <?= $item->text; ?>
    </div>
</div>