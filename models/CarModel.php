<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_model".
 *
 * @property int $id
 * @property int|null $brand_id
 * @property string $title
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property CarBrand $brand
 * @property CarGeneration[] $carGenerations
 */
class CarModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'status'], 'integer'],
            [['title', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarBrand::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(CarBrand::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[CarGenerations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarGenerations()
    {
        return $this->hasMany(CarGeneration::class, ['model_id' => 'id']);
    }
}
