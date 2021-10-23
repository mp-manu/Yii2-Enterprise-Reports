<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;
use yii\helpers\ArrayHelper;

/**
 * ReportSearch represents the model behind the search form of `app\models\Report`.
 */
class ReportSearch extends Report
{
    public $export;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'enterprise_id', 'amoun_workers', 'status', 'created_by', 'updated_by'], 'integer'],
            [['avarage_salary', 'paid_taxes', 'amount_power_charges'], 'number'],
            [['report_date', 'created_at', 'updated_at'], 'safe'],
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
        $industryModel = new IndustrySearch();

        $query = Report::find()->joinWith('enterprise')
            ->leftJoin('industry', 'enterprise.industry_id=industry.id');

        // add conditions that should always apply here



        $this->load($params);
        $industryModel->load($params);



        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if($this->export == 1){
            $dataProvider->pagination = false;
        }

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(!empty($this->report_date)){
            $dates = explode(' - ', $this->report_date);
            $query->andFilterWhere(['between',
                'report_date', $dates[0], $dates[1]
            ]);
        }

        if(!empty($industryModel->id)){
            $childs = Industry::getChildsList($industryModel->id);
            if(count($childs) > 0){
                $query->andFilterWhere(['IN', 'industry.id', ArrayHelper::map($childs, 'id', 'id')]);
            }else{
                $query->andFilterWhere(['industry.id' => $industryModel->id]);
            }

        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'enterprise_id' => $this->enterprise_id,
            'amoun_workers' => $this->amoun_workers,
            'avarage_salary' => $this->avarage_salary,
            'paid_taxes' => $this->paid_taxes,
            'amount_power_charges' => $this->amount_power_charges,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
