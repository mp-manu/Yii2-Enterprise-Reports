<?php

use yii\db\Migration;

/**
 * Class m211021_185844_seed_enterprise_table
 */
class m211021_185844_seed_enterprise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $this->insert(
                'enterprise',
                [
                    'industry_id' => rand(3, 7),
                    'name' => $faker->name,
                    'inn' => $faker->numberBetween(1900000000, 2147483646),
                    'address' => $faker->streetAddress(),
                    'tel' => $faker->phoneNumber(),
                    'status' => 1,
                    'created_at' => (new \yii\db\Expression('NOW()'))
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211021_185844_seed_enterprise_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211021_185844_seed_enterprise_table cannot be reverted.\n";

        return false;
    }
    */
}
