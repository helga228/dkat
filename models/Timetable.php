<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $id
 * @property int|null $speciality
 * @property string|null $course
 * @property string|null $group
 * @property string|null $subgroup
 * @property int|null $week
 * @property string|null $day
 * @property string|null $teacher
 * @property string|null $cabinet
 * @property string|null $lesson
 * @property string|null $number
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['speciality', 'week'], 'integer'],
            [['course', 'group', 'subgroup', 'day', 'number'], 'string'],
            [['teacher', 'cabinet', 'lesson'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speciality' => 'Speciality',
            'course' => 'Course',
            'group' => 'Group',
            'subgroup' => 'Subgroup',
            'week' => 'Week',
            'day' => 'Day',
            'teacher' => 'Teacher',
            'cabinet' => 'Cabinet',
            'lesson' => 'Lesson',
            'number' => 'Number',
        ];
    }
}
