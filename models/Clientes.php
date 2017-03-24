<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $cliente_id
 * @property integer $tipo_id
 * @property string $nombre
 * @property string $apellido
 * @property integer $edad
 * @property string $fecha_inscripcion
 *
 * @property Modalidad $tipo
 * @property Control[] $controls
 * @property Pagos[] $pagos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_id', 'nombre', 'apellido','edad','fecha_inscripcion'], 'required'],
            [['tipo_id', 'edad'], 'integer'],
            [['fecha_inscripcion'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 30],
            [['tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modalidad::className(), 'targetAttribute' => ['tipo_id' => 'tipo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cliente_id' => 'Cliente ID',
            'tipo_id' => 'Tipo ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'edad' => 'Edad',
            'fecha_inscripcion' => 'Fecha Inscripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Modalidad::className(), ['tipo_id' => 'tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControls()
    {
        return $this->hasMany(Control::className(), ['cliente_id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['id_cliente' => 'cliente_id']);
    }
}
