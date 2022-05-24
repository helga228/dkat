<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Timetable;

/**
 * TimetableSearch represents the model behind the search form of `app\models\Timetable`.
 */
class TimetableSearch extends Timetable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['speciality', 'required', 'message' => 'выберите специальность'],
            ['course', 'required', 'message' => 'выберите курс'],
            ['group', 'required', 'message' => 'укажите группу'],
            ['week', 'required', 'message' => 'веберите неделю'],
            [['id', 'speciality', 'week'], 'integer'],
            [['course', 'group', 'subgroup', 'day', 'teacher', 'cabinet', 'lesson'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Timetable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'speciality' => $this->speciality,
            'week' => $this->week,
        ]);

        $query->andFilterWhere(['course' => $this->course])
            ->andFilterWhere(['group' => $this->group])
            ->andFilterWhere(['subgroup' => $this->subgroup])
            ->andFilterWhere(['day' => $this->day])
            ->andFilterWhere(['teacher' => $this->teacher])
            ->andFilterWhere(['cabinet' => $this->cabinet])
            ->andFilterWhere(['lesson' => $this->lesson]);

        $tempModels = [];
        foreach ($dataProvider->models as $model) {
            $key = implode('-', [$model['number'], $model['day']]);
            if(!isset($tempModels[$key])){
                $tempModels[$key] = [
                    'number' => $model['number'],
                    'day' => $model['day'],
                    'subgroups' => [],
                ];
            }
            $tempModels[$key]['subgroups'][] = [
                'speciality' => $model['speciality'],
                'id' => $model['id'],
                'subgroup' => $model['subgroup'],
                'lesson' => $model['lesson'],
                'cabinet' => $model['cabinet'],
                'teacher' => $model['teacher'],
            ];
        }
        $dataProvider->models = $tempModels;

        return $dataProvider;

    }
}
