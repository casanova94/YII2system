<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modalidad".
 *
 * @property integer $tipo_id
 * @property string $tipo
 * @property double $tarifa
 *
 * @property Clientes[] $clientes
 */
class Modalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modalidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'tarifa'], 'required'],
            [['tarifa'], 'number'],
            [['tipo'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_id' => 'Tipo ID',
            'tipo' => 'Tipo',
            'tarifa' => 'Tarifa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::className(), ['tipo_id' => 'tipo_id']);
    }
}
