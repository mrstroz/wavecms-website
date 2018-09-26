<?php

/** @var \mrstroz\wavecms\page\models\PageItem[] $section */
/** @var \yii\web\View $this */

?>


<?php if ($section): ?>
    <?php foreach ($section as $item): ?>
        <?= $this->render($item->template ? 'section/' . $item->template : 'section/blank', ['item' => $item]); ?>
    <?php endforeach; ?>
<?php endif; ?>