<?php

namespace dmstr\modules\redirect\models\search;

use dmstr\modules\redirect\models\Redirect as RedirectModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Redirect represents the model behind the search form about `dmstr\modules\redirect\models\Redirect`.
 */
class Redirect extends RedirectModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_code'], 'integer'],
            [['source', 'destination', 'status_code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
        $query = RedirectModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['status_code' => $this->status_code])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'destination', $this->destination]);

        return $dataProvider;
    }
}