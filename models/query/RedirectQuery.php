<?php

namespace dmstr\modules\redirect\models\query;

/**
 * This is the ActiveQuery class for [[\dmstr\modules\redirect\models\Redirect]].
 *
 * @see \dmstr\modules\redirect\models\Redirect
 */
class RedirectQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return \dmstr\modules\redirect\models\Redirect[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \dmstr\modules\redirect\models\Redirect|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
