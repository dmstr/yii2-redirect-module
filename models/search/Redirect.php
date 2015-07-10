<?php

namespace dmstr\modules\redirect\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dmstr\modules\redirect\models\Redirect as RedirectModel;

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
[['id', 'status_code'], 'integer'],
            [['type', 'from_domain', 'to_domain', 'from_path', 'to_path', 'created_at', 'updated_at'], 'safe'],
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
$query = RedirectModel::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'status_code' => $this->status_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'from_domain', $this->from_domain])
            ->andFilterWhere(['like', 'to_domain', $this->to_domain])
            ->andFilterWhere(['like', 'from_path', $this->from_path])
            ->andFilterWhere(['like', 'to_path', $this->to_path]);

return $dataProvider;
}
}