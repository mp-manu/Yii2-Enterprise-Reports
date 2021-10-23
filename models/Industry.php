<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
            'parent_id' => 'Категория отраслей',
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

    public static function getList()
    {
        return self::find()->where(['status' => self::STATUS_ACTIVE])->asArray()->all();
    }

    public static function getPrentsList()
    {
        return self::find()->where(['=', 'parent_id', 0])->andWhere(['status' => self::STATUS_ACTIVE])->asArray()->all();
    }

    public static function getChildsList($id = 0)
    {
        if ($id > 0) {
            return self::find()
                ->where(['parent_id' => $id])
                ->andWhere(['status' => self::STATUS_ACTIVE])
                ->asArray()->all();
        }
        return self::find()
            ->where(['>', 'parent_id', 0])
            ->andWhere(['status' => self::STATUS_ACTIVE])
            ->asArray()->all();
    }

    public static function getStatusList(){
        return array(self::STATUS_ACTIVE => 'Активный', self::STATUS_INACTIVE => 'Неактивный');
    }
}
