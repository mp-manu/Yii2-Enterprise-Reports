<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $enterprise_id
 * @property int $amoun_workers
 * @property float $avarage_salary
 * @property float $paid_taxes
 * @property float|null $amount_power_charges
 * @property string|null $report_date
 * @property int|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Enterprise $enterprise
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_id', 'amoun_workers', 'avarage_salary', 'paid_taxes'], 'required'],
            [['enterprise_id', 'amoun_workers', 'status', 'created_by', 'updated_by'], 'integer'],
            [['avarage_salary', 'paid_taxes', 'amount_power_charges'], 'number'],
            [['report_date', 'created_at', 'updated_at'], 'safe'],
            [['enterprise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprise::className(), 'targetAttribute' => ['enterprise_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enterprise_id' => 'Предприятие',
            'amoun_workers' => 'Количество работников',
            'avarage_salary' => 'Средняя зарплата работников',
            'paid_taxes' => 'Сумма уплаченных налогов',
            'amount_power_charges' => 'Сумма начислений',
            'supplier_name' => 'Наименование поставщика',
            'report_date' => 'Дата отчета',
            'status' => 'Статус',
            'created_at' => 'Дата и время добавление',
            'created_by' => 'Добавил',
            'updated_at' => 'Время пос. обновление',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[Enterprise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnterprise()
    {
        return $this->hasOne(Enterprise::className(), ['id' => 'enterprise_id']);
    }
}
