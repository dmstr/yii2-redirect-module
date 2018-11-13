<?php

namespace dmstr\modules\redirect\models;

use Yii;
use \dmstr\modules\redirect\models\base\Redirect as BaseRedirect;
use yii\caching\TagDependency;

/**
 * This is the model class for table "dmstr_redirect".
 */
class Redirect extends BaseRedirect
{

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        TagDependency::invalidate(Yii::$app->cache, 'redirects');
    }
}
