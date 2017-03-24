<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagos;

/**
 * PagosSearch represents the model behind the search form about `app\models\Pagos`.
 */
class PagosSearch extends Pagos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pago'], 'integer'],
            [['monto'], 'number'],
            [['estado', 'id_cliente', 'fecha_pago'], 'safe'],
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
        $query = Pagos::find();

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
            'id_pago' => $this->id_pago,
            //'id_cliente' => $this->id_cliente,
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_pago,
        ]);


        $query->joinWith(['cliente']);
        $query->andFilterWhere(['like','CONCAT(clientes.nombre,clientes.apellido)',$this->id_cliente]);
        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
