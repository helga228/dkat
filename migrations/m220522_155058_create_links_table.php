<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m220522_155058_create_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'link' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
