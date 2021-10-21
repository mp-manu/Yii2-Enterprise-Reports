<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enterprise}}`.
 */
class m211021_183002_create_enterprise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enterprise}}', [
            'id' => $this->primaryKey(),
            'industry_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'inn' => $this->string(12)->notNull(),
            'address' => $this->string(255),
            'tel' => $this->string(25),
            'status' => $this->tinyInteger(2)->defaultValue(1),
            'created_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->integer(11)
        ]);

        $this->addForeignKey(
            'fk-enterprise-industry-id',
            'enterprise',
            'industry_id',
            'industry',
            'id',
            'CASCADE'
        );
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%enterprise}}');
    }
}
