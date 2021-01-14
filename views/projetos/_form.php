<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Projetos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projetos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome_do_Projeto')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'Data_de_Inicio')->textInput() ?>

    <?= $form->field($model, 'Data_de_Termino')->textInput() ?>

    <?= $form->field($model, 'Valor_do_Projeto')->textInput() ?>

    <?= $form->field($model, 'Risco')->textInput() ?>

    <?= $form->field($model, 'Participantes')->textarea(['rows' => 6]) ?>

    <?/*Aqui foi retirado os campos de Valor_de_Investimento e Retorno para serem acessíveis aos usuários*/?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
