<?php

use yii\db\Migration;

/**
 * Class m230425_152121_table_service
 */
class m230425_152121_table_service extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'service_type_id'=> $this->integer()->notNull()->comment('вид услуги'),
            'car_id'=> $this->integer()->notNull()->comment('комплектация авто'),
            'description'=> $this->string()->comment('описание работ'),
            'price'=> $this->integer()->comment('цена за услугу'),
            'created_at'=> $this->timestamp()->notNull(),
            'updated_at'=> $this->timestamp(),
            'status'=> $this->smallInteger()->defaultValue(1),
        ], $tableOptions);

        $this->addForeignKey(
            'FK_service_type_id_service',
            'service',
            'service_type_id',
            'service_type',
            'id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'FK_car_id_service',
            'service',
            'car_id',
            'car',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'FK_service_type_id_service',
            'service'
        );
        $this->dropForeignKey(
            'FK_car_id_service',
            'service'
        );

        $this->dropTable('{{%service}}');
    }
}