<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjetosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciador de Projetos';        //título da pagina de gerenciamento de projetos
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projetos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Novo Projeto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            'Nome_do_Projeto:ntext',
            'Data_de_Inicio',
            'Data_de_Termino',
            'Valor_do_Projeto',
            'Risco',
            //'Participantes:ntext',
            //'Valor_do_Investimento',
            //'Retorno_financeiro',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
