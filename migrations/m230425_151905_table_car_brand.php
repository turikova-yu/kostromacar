<?php

use yii\db\Migration;

/**
 * Class m230425_151905_table_car_brand
 */
class m230425_151905_table_car_brand extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%car_brand}}', [
            'id' => $this->primaryKey(),
            'title'=> $this->string()->notNull()->unique(),
            'created_at'=> $this->timestamp()->notNull(),
            'updated_at'=> $this->timestamp(),
            'status'=> $this->smallInteger()->defaultValue(1),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%car_brand}}');
    }
}