<?php

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class m150710_121215_dmstr_redirect_table extends \yii\db\Migration
{

    public function up()
    {
        $this->createTable('dmstr_redirect',
            [
                'id' => $this->primaryKey(),
                'type' => $this->string(10),
                'from_domain' => $this->string(255)->null(),
                'to_domain' => $this->string(255)->null(),
                'from_path' => $this->string(255)->null(),
                'to_path' => $this->string(255)->null(),
                'status_code' => $this->integer(3)->notNull(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]);
    }

    public function down()
    {
        return false;
    }
}
