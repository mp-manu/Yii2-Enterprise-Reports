<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%industry}}`.
 */
class m211021_182452_create_industry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%industry}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->defaultValue(0),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'status' => $this->tinyInteger(2)->defaultValue(1),
            'created_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%industry}}');
    }
}
