<?php

use mrstroz\wavecms\page\components\helpers\Front;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\components\helpers\T;

/** @var \mrstroz\wavecms\page\models\Menu[] $menu */

?>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="<?= Url::home(); ?>" class="navbar-brand">
                <?= T::__('web', 'WaveCMS websites'); ?>
            </a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <?php if ($menu): ?>
                <ul class="nav navbar-nav">
                    <?php foreach ($menu as $item): ?>
                        <?php $submenu = $item->submenu; ?>

                        <?php if ($submenu): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="id_<?= $item->id; ?>">
                                    <?= $item->title; ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="id_<?= $item->id; ?>">
                                    <?php foreach ($submenu as $itemSubmenu): ?>
                                        <?php $class = (Front::isLinkActive($itemSubmenu) ? 'active' : ''); ?>
                                        <li>
                                            <a href="<?= Front::linkUrl($itemSubmenu->page_id, $itemSubmenu->page_url) ?>"
                                               class="<?= $class ?>"><?= $itemSubmenu->title; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <?php $class = (Front::isLinkActive($item) ? 'active' : ''); ?>
                            <li>
                                <a href="<?= Front::linkUrl($item->page_id, $item->page_url) ?>"
                                   class="<?= $class ?>"><?= $item->title; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <ul class="nav navbar-nav navbar-right">
                <li><?= Html::a('EN', ['/', 'language' => 'en']) ?></li>
                <li><?= Html::a('PL', ['/', 'language' => 'pl']) ?></li>
            </ul>

        </div>
    </div>
</div>