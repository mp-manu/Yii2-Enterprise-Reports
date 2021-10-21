<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enterprise".
 *
 * @property int $id
 * @property int $industry_id
 * @property string $name
 * @property string $inn
 * @property string|null $address
 * @property string|null $tel
 * @property int|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Industry $industry
 * @property Report[] $reports
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['industry_id', 'name', 'inn'], 'required'],
            [['industry_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
            [['tel'], 'string', 'max' => 25],
            [['industry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['industry_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'industry_id' => 'Отрасль',
            'name' => 'Название',
            'inn' => 'ИНН',
            'address' => 'Адрес',
            'tel' => 'Телефон',
            'status' => 'Статус',
            'created_at' => 'Дата и время добавление',
            'created_by' => 'Добавил',
            'updated_at' => 'Время пос. обновление',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[Industry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'industry_id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['enterprise_id' => 'id']);
    }
}
