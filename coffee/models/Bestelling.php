<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bestelling".
 *
 * @property int $id
 * @property int $medewerker_id
 * @property string $naam
 * @property int $menu_id
 * @property string $status
 * @property string $timestamp
 */
class Bestelling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bestelling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'medewerker_id', 'menu_id'], 'integer'],
            [['status'], 'string'],
            [['timestamp'], 'safe'],
            [['naam'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'medewerker_id' => 'Medewerker ID',
            'naam' => 'Naam',
            'menu_id' => 'Menu ID',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }
}