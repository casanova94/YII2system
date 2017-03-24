<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Control;

/**
 * ControlSearch represents the model behind the search form about `app\models\Control`.
 */
class ControlSearch extends Control
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['control_id'], 'integer'],
            [['peso', 'medida_cintura'], 'number'],
            [['fecha_control', 'cliente_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Control::find();

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
            'control_id' => $this->control_id,
            //'cliente_id' => $this->cliente_id,
            'peso' => $this->peso,
            'medida_cintura' => $this->medida_cintura,
            'fecha_control' => $this->fecha_control,
        ]);

        $query->joinWith(['cliente']);
        $query->andFilterWhere(['like','CONCAT(clientes.nombre,clientes.apellido)',$this->cliente_id]);

        return $dataProvider;
    }
}
