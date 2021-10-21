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
                'name' => 'Химическая',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 0,
                'name' => 'Пищевая',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'name' => 'Фармацевтика',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'name' => 'Нефтепродукты',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'name' => 'Молочная',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'name' => 'Мясная',
                'created_at' => (new \yii\db\Expression('NOW()'))
            ]
        );
        $this->insert(
            'industry',
            [
                'parent_id' => 1,
                'name' => 'Напитки безалкогольные',
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
