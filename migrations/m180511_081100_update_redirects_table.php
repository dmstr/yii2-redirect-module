<?php

use yii\db\Migration;

class m180511_081100_update_redirects_table extends Migration
{
    public function up()
    {
        $this->execute("UPDATE dmstr_redirect SET from_domain = from_path, to_domain = to_path WHERE (from_domain = '' OR from_domain IS NULL) AND (to_domain = '' OR to_domain IS NULL);");
        $this->renameColumn('dmstr_redirect','from_domain','source');
        $this->renameColumn('dmstr_redirect','to_domain','destination');
        $this->alterColumn('dmstr_redirect','source','VARCHAR(255) NOT NULL');
        $this->alterColumn('dmstr_redirect','destination','VARCHAR(255) NOT NULL');

        $this->dropColumn('dmstr_redirect','type');
        $this->dropColumn('dmstr_redirect','from_path');
        $this->dropColumn('dmstr_redirect','to_path');
        
        $this->createIndex('UNIQUE_source','dmstr_redirect','source',true);
    }

    public function down()
    {
        echo 'Cannot revert m180511_081100_update_redirects_table';
        return false;
    }

}
