<?php

use mrstroz\wavecms\page\components\helpers\Front;

/** @var \mrstroz\wavecms\page\models\PageItem[] $grid */

?>


<?php if ($grid): ?>
    <div class="row">
        <?php foreach ($grid as $item): ?>
            <div class="col-lg-4">
                <h2><?= $item->title; ?></h2>

                <?= $item->text; ?>

                <p>
                    <?= Front::link($item, $item->link_title, ['class' => 'btn btn-default'], [
                        'page_id' => 'link_page_id',
                        'page_url' => 'link_page_url',
                        'page_blank' => 'link_page_blank'
                    ]); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>