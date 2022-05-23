<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%timetable}}`.
 */
class m220522_104449_add_number_column_to_timetable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%timetable}}', 'number', $this->string(7)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%timetable}}', 'number');
    }
}
