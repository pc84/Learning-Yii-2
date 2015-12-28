<?php

namespace app\models;

use Yii;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class State extends ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_states';
    }

    public static function findById($id)
    {
        $state = State::findById($id)->all();

        return $state;
    }

}
