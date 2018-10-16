<?php

namespace app\modules\admin\models\search;

use app\models\Review;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class ReviewSearch extends Review
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['content'], 'string'],
            [['name', 'slug', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
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
        $query = Review::find();


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
            self::tableName().'.status' => $this->status,
            self::tableName().'.created_at' => $this->created_at,
            self::tableName().'.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', self::tableName().'.slug', $this->slug])
            ->andFilterWhere(['like', self::tableName().'.name', $this->name]);

        return $dataProvider;
    }
}
