<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Calc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projetos-calc">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo "<br/>teste<br/><br/<br/><br/><br/>";?>
    <?= $form->field($model, 'Valor_do_Projeto')->textInput() ?>

    <?= $form->field($model, 'Risco')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Calcular', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
