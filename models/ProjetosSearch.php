<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projetos;

/**
 * ProjetosSearch represents the model behind the search form of `app\models\Projetos`.
 */
class ProjetosSearch extends Projetos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Risco'], 'integer'],
            [['Nome_do_Projeto', 'Data_de_Inicio', 'Data_de_Termino', 'Participantes'], 'safe'],
            [['Valor_do_Projeto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Projetos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'Data_de_Inicio' => $this->Data_de_Inicio,
            'Data_de_Termino' => $this->Data_de_Termino,
            'Valor_do_Projeto' => $this->Valor_do_Projeto,
            'Risco' => $this->Risco,
        ]);

        $query->andFilterWhere(['like', 'Nome_do_Projeto', $this->Nome_do_Projeto])
            ->andFilterWhere(['like', 'Participantes', $this->Participantes]);

        return $dataProvider;
    }
}
