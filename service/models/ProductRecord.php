<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Database fields:
 * @property integer $id
 * @property string  $title
 * @property integer $price
 * @property integer $quantity
 */
class ProductRecord extends ActiveRecord
{
    /**
     * Return table name from DB
     * @return string
     */
    public static function tableName(): string
    {
        return "product";
    }
}