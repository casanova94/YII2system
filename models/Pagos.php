<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property integer $id_pago
 * @property integer $id_cliente
 * @property double $monto
 * @property string $estado
 * @property string $fecha_pago
 *
 * @property Clientes $idCliente
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'monto', 'estado', 'fecha_pago'], 'required'],
            [['id_cliente'], 'integer'],
            [['monto'], 'number'],
            [['fecha_pago'], 'safe'],
            [['estado'], 'string', 'max' => 10],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_cliente' => 'cliente_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pago' => 'Id Pago',
            'id_cliente' => 'Id Cliente',
            'monto' => 'Monto',
            'estado' => 'Estado',
            'fecha_pago' => 'Fecha Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['cliente_id' => 'id_cliente']);
    }
}
