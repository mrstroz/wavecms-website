<?php

use mrstroz\wavecms\page\components\helpers\Front;
use mrstroz\wavecms\page\models\PageSettings;

/** @var \mrstroz\wavecms\page\models\Menu[] $menu */

?>

<?php if ($menu): ?>
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav navbar-nav">
                        <?php foreach ($menu as $item): ?>
                            <?php $class = (Front::isLinkActive($item) ? 'active' : ''); ?>
                            <li>
                                <a href="<?= Front::linkUrl($item->page_id, $item->page_url) ?>"
                                   class="<?= $class ?>"><?= $item->title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <?= PageSettings::get('footer_copyright',true); ?>
                </div>
            </div>

        </footer>
    </div>
<?php endif; ?>