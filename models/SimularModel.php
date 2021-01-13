<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for table "projetos".
 *
 * @property int $Id Indice da tabela
 */
class SimularModel extends Model
{
    /**
     * {@inheritdoc}
     */
    public $Id;
    public $investimento;
    public $valor_de_retorno;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['investimento'], 'required'],
            [['investimento','valor_de_retorno'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'investimento' => 'Valor do Investimento',
            'valor_de_retorno' => 'Valor de Retorno',
        ];
    }
}