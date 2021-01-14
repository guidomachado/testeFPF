<?php
use app\models\Projetos;
use yii\db\Connection;
use app\View;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php
$valor_ins = $model->investimento;
$projetos = Projetos::findOne($model1->Id);

$valor_de_risco=$projetos->Risco;

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
$projetos->Valor_do_Investimento=$valor_ins;
$projetos->Retorno_financeiro = $valor_de_retorno;
$projetos->save();
?>
<h2>Confirmando as informações da simulação</h2>



<ul>
<li><label>Valor de Investimento:</label><?=$model->investimento?></li>
<li><label>Valor de retorno:</label><?=" ".$valor_de_retorno?></li>
</ul>
<div class="form-group">


<?= Html::a('Salvar Simulação no projeto', ['view', 'id' => $model1->Id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Deseja realmente salvar sua simulação no projeto??',
            'method' => 'post',
        ],
    ]) ?>
</div>