<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_generation".
 *
 * @property int $id
 * @property int|null $model_id
 * @property string $title название поколения
 * @property int|null $start_date год начала производства
 * @property int|null $end_date год окончания производства
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property Car[] $cars
 * @property CarModel $model
 */
class CarGeneration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_generation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_id', 'start_date', 'end_date', 'status'], 'integer'],
            [['title', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarModel::class, 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_id' => 'Model ID',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['generation_id' => 'id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(CarModel::class, ['id' => 'model_id']);
    }
}
