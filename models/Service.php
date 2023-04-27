<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int $service_type_id вид услуги
 * @property int $car_id комплектация авто
 * @property string|null $description описание работ
 * @property int|null $price цена за услугу
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property Car $car
 * @property ServiceType $serviceType
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_type_id', 'car_id', 'created_at'], 'required'],
            [['service_type_id', 'car_id', 'price', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string', 'max' => 255],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
            [['service_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceType::class, 'targetAttribute' => ['service_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_type_id' => 'Service Type ID',
            'car_id' => 'Car ID',
            'description' => 'Description',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }

    /**
     * Gets query for [[ServiceType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceType()
    {
        return $this->hasOne(ServiceType::class, ['id' => 'service_type_id']);
    }
}
