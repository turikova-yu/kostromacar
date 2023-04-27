<?php

use yii\db\Migration;

/**
 * Class m230425_151947_table_car_generation
 */
class m230425_151947_table_car_generation extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%car_generation}}', [
            'id' => $this->primaryKey(),
            'model_id'=> $this->integer(),
            'title'=> $this->string()->notNull()->comment('название поколения'),
            'start_date' => $this->integer()->comment('год начала производства'),
            'end_date' => $this->integer()->comment('год окончания производства'),
            'created_at'=> $this->timestamp()->notNull(),
            'updated_at'=> $this->timestamp(),
            'status'=> $this->smallInteger()->defaultValue(1),
        ], $tableOptions);


        $this->addForeignKey(
            'FK_model_id_car_generation',
            'car_generation',
            'model_id',
            'car_model',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'FK_model_id_car_generation',
            'car_generation'
        );

        $this->dropTable('{{%car_generation}}');
    }
}