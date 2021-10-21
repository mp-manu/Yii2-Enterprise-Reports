<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industry".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $description
 * @property int|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Enterprise[] $enterprises
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Категория',
            'name' => 'Отрасль',
            'description' => 'Описание',
            'status' => 'Статус',
            'created_at' => 'Дата и время добавление',
            'created_by' => 'Добавил',
            'updated_at' => 'Время пос. обновление',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[Enterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnterprises()
    {
        return $this->hasMany(Enterprise::className(), ['industry_id' => 'id']);
    }
}
