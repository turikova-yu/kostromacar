<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $generation_id модель, марка, поколение
 * @property string|null $body кузов
 * @property string|null $transmission коробка передач
 * @property string|null $motor вид двигателя
 * @property string|null $wheel_drive тип привода
 * @property string|null $engine_capacity объем двигателя
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property CarGeneration $generation
 * @property Service[] $services
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['generation_id', 'created_at'], 'required'],
            [['generation_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['body', 'transmission', 'motor', 'wheel_drive', 'engine_capacity'], 'string', 'max' => 255],
            [['generation_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarGeneration::class, 'targetAttribute' => ['generation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'generation_id' => 'Generation ID',
            'body' => 'Body',
            'transmission' => 'Transmission',
            'motor' => 'Motor',
            'wheel_drive' => 'Wheel Drive',
            'engine_capacity' => 'Engine Capacity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Generation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeneration()
    {
        return $this->hasOne(CarGeneration::class, ['id' => 'generation_id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::class, ['car_id' => 'id']);
    }
}
