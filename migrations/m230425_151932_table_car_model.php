<?php

use yii\db\Migration;

/**
 * Class m230425_151932_table_car_model
 */
class m230425_151932_table_car_model extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%car_model}}', [
            'id' => $this->primaryKey(),
            'brand_id'=> $this->integer(),
            'title'=> $this->string()->notNull(),
            'created_at'=> $this->timestamp()->notNull(),
            'updated_at'=> $this->timestamp(),
            'status'=> $this->smallInteger()->defaultValue(1),
        ], $tableOptions);

        $this->addForeignKey(
            'FK_brand_id_car_model',
            'car_model',
            'brand_id',
            'car_brand',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'FK_brand_id_car_model',
            'car_model'
        );

        $this->dropTable('{{%car_model}}');


    }
}