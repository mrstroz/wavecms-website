<?php

use mrstroz\wavecms\page\components\helpers\Front;
use mrstroz\wavecms\page\models\PageItem;

/** @var PageItem[] $slider */

?>


<?php if ($slider): ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            <?php foreach ($slider as $item): ?>
                <li data-target="#myCarousel"
                    data-slide-to="<?= $i; ?>"<?php if ($i === 0): ?> class="active"<?php endif; ?>></li>
                <?php $i++; ?>
            <?php endforeach; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php $i = 0; ?>
            <?php foreach ($slider as $item): ?>
                <div class="item <?php if ($i === 0): ?>active<?php endif; ?>">
                    <?= Front::img($item->image); ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php endif; ?>