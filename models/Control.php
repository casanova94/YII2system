<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control".
 *
 * @property integer $control_id
 * @property integer $cliente_id
 * @property double $peso
 * @property double $medida_cintura
 * @property string $fecha_control
 *
 * @property Clientes $cliente
 */
class Control extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'control';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'peso', 'medida_cintura', 'fecha_control'], 'required'],
            [['cliente_id'], 'integer'],
            [['peso', 'medida_cintura'], 'number'],
            [['fecha_control'], 'safe'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'cliente_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'control_id' => 'Control ID',
            'cliente_id' => 'Cliente ID',
            'peso' => 'Peso',
            'medida_cintura' => 'Medida Cintura',
            'fecha_control' => 'Fecha Control',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['cliente_id' => 'cliente_id']);
    }
}
