<?php

use frontend\components\widgets\Grid;
use frontend\components\widgets\Slider;
use frontend\components\widgets\Section;
use mrstroz\wavecms\page\models\Page;

/* @var yii\web\View $this */
/** @var Page $page */

?>


<div class="row">
    <div class="col-md-12">
        <h1><?= $page->title; ?></h1>
        <?= $page->text; ?>
    </div>
</div>

<?= Slider::widget(['slider' => $page->slider]); ?>

<hr/>

<?= Grid::widget(['grid' => $page->grid]); ?>

<hr/>

<?= Section::widget(['section' => $page->sections]); ?>
