<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projetos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Nome_do_Projeto') ?>

    <?= $form->field($model, 'Data_de_Inicio') ?>

    <?= $form->field($model, 'Data_de_Termino') ?>

    <?= $form->field($model, 'Valor_do_Projeto') ?>

    <?php // echo $form->field($model, 'Risco') ?>

    <?php // echo $form->field($model, 'Participantes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
