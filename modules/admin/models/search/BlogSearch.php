<?php

namespace app\modules\admin\models\search;

use app\models\Blog;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class BlogSearch extends Blog
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['content'], 'string'],
            [['name', 'slug', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
        ];
    }
    public $city_id;

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
        $query = Blog::find();

        // add conditions that should always apply here

        if(!Yii::$app->user->can('superAdmin') && !Yii::$app->user->can('developer')) {
//            $query->andFilterWhere(['terminal_id' => Admin::terminalsIds()]);
        }


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
        ]);

        $query->andFilterWhere(['like', self::tableName().'slug', $this->slug])
            ->andFilterWhere(['like', self::tableName().'.name', $this->name]);
        $query->orderBy(['sort' => SORT_DESC]);

        return $dataProvider;
    }
}