<?php
use app\models\Projetos;
use yii\db\Connection;
use app\View;
use Codeception\Step\Action;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Simular Investimento';
$this->title = $model1->Id;
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="projetos-simular">

<h2>Simular Investimento </h2>
<hr>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model,'investimento') ?>

<div class="form-group">


<?= Html::submitButton('Cálculo de Retorno do Investimento',['class'=>'btn btn-warning'])?>
</div>
<?php ActiveForm::end(); ?>














