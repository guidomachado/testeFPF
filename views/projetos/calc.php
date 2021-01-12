<?php

use app\models\Projetos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Connection;
/* @var $this yii\web\View */
/* @var $model app\models\Calc */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="projetos-calc">

<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Valor_do_Investimento')->textInput() ?>
    
<div>
<?php $projetos = Projetos::findOne($model->Id);?>
<?php $valor_ins=$projetos->Valor_do_Investimento;?>
<?php $valor_de_risco=$projetos->Risco;
if ($valor_de_risco == 0) //Risco baixo
{
    $valor_de_retorno = ($valor_ins*5)/100;
}
if ($valor_de_risco == 1) //Risco Médio
{
    $valor_de_retorno = ($valor_ins*10)/100;
}
if ($valor_de_risco == 2) //Risco Alto
{
    $valor_de_retorno = ($valor_ins*20)/100;
}
$projetos->Retorno_financeiro = $valor_de_retorno;
$projetos->save();
?>

 </div>

    <div class="form-group">


    <?= Html::a('simular', ['update', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'deseja simular?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
