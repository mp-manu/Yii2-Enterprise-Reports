<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%report}}`.
 */
class m211021_183014_create_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%report}}', [
            'id' => $this->primaryKey(),
            'enterprise_id' => $this->integer(11)->notNull(),
            'amoun_workers' => $this->integer()->notNull(),
            'avarage_salary' => $this->float('2')->notNull(),
            'paid_taxes' => $this->float('2')->notNull(),
            'amount_power_charges' => $this->float('2'),
            'supplier_name' => $this->string(255),
            'report_date' => $this->date(),
            'status' => $this->tinyInteger(2)->defaultValue(0),
            'created_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->integer(11)
        ]);

        $this->addForeignKey(
            'fk-report-enterprise-id',
            'report',
            'enterprise_id',
            'enterprise',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%report}}');
    }
}
