<?php

use mrstroz\wavecms\page\models\PageItem;
use yii\web\View;

/** @var View $this */
/** @var PageItem[] $section */

?>


<?php if ($section): ?>
    <?php foreach ($section as $item): ?>
        <?= $this->render($item->template ? 'section/' . $item->template : 'section/blank', ['item' => $item]); ?>
    <?php endforeach; ?>
<?php endif; ?>