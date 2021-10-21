<?php

use yii\db\Migration;

/**
 * Class m211021_185836_seed_industry_table
 */
class m211021_185836_seed_industry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(
            'industry',
            [
                'parent_id' => 0,
                'fullname' => 'Химическая',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 0,
                'fullname' => 'Пищевая',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'fullname' => 'Фармацевтика',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'fullname' => 'Нефтепродукты',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'fullname' => 'Молочная',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'fullname' => 'Мясная',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'fullname' => 'Напитки безалкогольные',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211021_185836_seed_industry_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211021_185836_seed_industry_table cannot be reverted.\n";

        return false;
    }
    */
}
