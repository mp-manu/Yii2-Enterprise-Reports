<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

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
            ['supplier_name', 'required', 'when' => function ($model) {
                return $model->amount_power_charges > 0;
                }, 'whenClient' => "function (attribute, value) {
                    return $('#report-amount_power_charges').val() > 0;
                }"
            ],
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

    public static function getStatusList()
    {
        return array(self::STATUS_ACTIVE => 'Активный', self::STATUS_INACTIVE => 'Неактивный');
    }
}
