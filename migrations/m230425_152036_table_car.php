<?php

use yii\db\Migration;

/**
 * Class m230425_152036_table_car
 */
class m230425_152036_table_car extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'generation_id' => $this->integer()->notNull()->comment('модель, марка, поколение'),
            'body' => $this->string()->comment('кузов'),
            'transmission' => $this->string()->comment('коробка передач'),
            'motor' => $this->string()->comment('вид двигателя'),
            'wheel_drive' => $this->string()->comment('тип привода'),
            'engine_capacity' => $this->string()->comment('объем двигателя'),
            'created_at'=> $this->timestamp()->notNull(),
            'updated_at'=> $this->timestamp(),
            'status'=> $this->smallInteger()->defaultValue(1),
        ], $tableOptions);

        $this->addForeignKey(
            'FK_generation_id_car',
            'car',
            'generation_id',
            'car_generation',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'FK_generation_id_car',
            'car'
        );

        $this->dropTable('{{%car}}');
    }
}

