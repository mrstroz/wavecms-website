<?php

use frontend\components\widgets\Grid;
use frontend\components\widgets\Slider;
use frontend\components\widgets\Section;

/* @var $this yii\web\View */
/** @var \mrstroz\wavecms\page\models\Page $page */

?>

    <div class="jumbotron">
        <h1><?= $page->title; ?></h1>
        <p class="lead"><?= $page->text; ?></p>
    </div>

    <hr/>

<?= Slider::widget(['slider' => $page->slider]); ?>

    <hr/>

<?= Grid::widget(['grid' => $page->grid]); ?>

    <hr/>

<?= Section::widget(['section' => $page->sections]); ?>