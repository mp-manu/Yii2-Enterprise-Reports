<?php

use yii\db\Migration;

/**
 * Class m211021_185936_seed_report_table
 */
class m211021_185936_seed_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $this->insert(
                'report',
                [
                    'enterprise_id' => rand(1,20),
                    'amoun_workers' => rand(15, 10000),
                    'avarage_salary' => $faker->randomFloat(),
                    'paid_taxes' => $faker->randomFloat(),
                    'amount_power_charges' => $faker->randomFloat(),
                    'supplier_name' => $faker->firstName(),
                    'report_date' => $faker->date('Y-m-d'),
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
        echo "m211021_185936_seed_report_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211021_185936_seed_report_table cannot be reverted.\n";

        return false;
    }
    */
}
