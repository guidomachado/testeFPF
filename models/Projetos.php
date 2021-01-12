<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projetos".
 *
 * @property int $Id Indice da tabela
 * @property string $Nome_do_Projeto
 * @property string $Data_de_Inicio
 * @property string $Data_de_Termino
 * @property float $Valor_do_Projeto
 * @property int $Risco
 * @property string $Participantes
 * @property float $Valor_do_Investimento Input do investimento do cliente
 * @property float $Retorno_financeiro Mostrar o retorno para o cliente
 */
class Projetos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projetos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome_do_Projeto', 'Data_de_Inicio', 'Data_de_Termino', 'Valor_do_Projeto', 'Risco', 'Participantes'],'required'],
            [['Nome_do_Projeto', 'Participantes'], 'string'],
            [['Data_de_Inicio', 'Data_de_Termino'], 'safe'],
            [['Valor_do_Projeto', 'Valor_do_Investimento', 'Retorno_financeiro'], 'number'],
            [['Risco'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nome_do_Projeto' => 'Nome Do Projeto',
            'Data_de_Inicio' => 'Data De Inicio',
            'Data_de_Termino' => 'Data De Termino',
            'Valor_do_Projeto' => 'Valor Do Projeto',
            'Risco' => 'Risco',
            'Participantes' => 'Participantes',
            'Valor_do_Investimento' => 'Valor Do Investimento',
            'Retorno_financeiro' => 'Retorno Financeiro',
        ];
    }
}
