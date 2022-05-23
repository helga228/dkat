<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%timetable}}`.
 */
class m220515_162446_create_timetable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%timetable}}', [
            'id' => $this->primaryKey(),
            'speciality' => $this->integer(),
            'course' => $this->text(),
            'group' => $this->text(),
            'subgroup' => $this->text(),
            'week' => $this->integer(),
            'day' => $this->text(),
            'teacher' => $this->string(),
            'cabinet' => $this->string(),
            'lesson' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%timetable}}');
    }
}
