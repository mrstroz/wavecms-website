<?php

/* @var $this yii\web\View */

/** @var \mrstroz\wavecms\form\models\Form $model */

/** @var \mrstroz\wavecms\page\models\Page $page */

use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

?>


<div class="row">
    <div class="col-md-12">
        <h1><?= $page->title; ?></h1>
        <?= $page->text; ?>
    </div>
</div>

<?php

Pjax::begin();
/** @var \mrstroz\wavecms\form\models\FormSettings $formSettings */
if ($formSettings) {
    echo $formSettings->thanks_text;
} else {
    $form = ActiveForm::begin(['options' => ['data-pjax' => true]]);

    echo Html::activeHiddenInput($model, 'language', ['value' => Yii::$app->language]);
    echo Html::activeHiddenInput($model, 'type', ['value' => 'contact']);

    echo $form->field($model, 'name');
    echo $form->field($model, 'company');
    echo $form->field($model, 'email');
    echo $form->field($model, 'phone');
    echo $form->field($model, 'subject');
    echo $form->field($model, 'text')->textarea();
    echo $form->field($model, 'agree_1')->checkbox();
    echo $form->field($model, 'agree_2')->checkbox();

    echo $form->field($model, 'reCaptcha')->label(false)->widget(ReCaptcha::class);


    echo Html::submitButton('Send message', ['class' => 'btn btn-primary']);

    ActiveForm::end();
}
Pjax::end();

?>

