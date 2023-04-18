<?php

use yii\db\Migration;

/**
 * Class m230409_174551_add_verification_token_column
 */
class m230409_174551_add_verification_token_column extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
