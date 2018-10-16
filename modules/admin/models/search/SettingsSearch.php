<?php

namespace app\modules\admin\models\search;

use app\models\Settings;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class SettingsSearch extends Settings
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'second_phone'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
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
        $query = Settings::find();


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
            self::tableName().'.id' => $this->id,
            self::tableName().'.phone' => $this->phone,
            self::tableName().'.second_phone' => $this->second_phone,
        ]);

        return $dataProvider;
    }
}
