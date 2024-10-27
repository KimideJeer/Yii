<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $naam
 * @property int $prijs
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam', 'prijs'], 'required'],
            [['prijs'], 'integer'],
            [['naam'], 'string', 'max' => 200],
        ];
    }

    public function getBestellingen()
    {
        return $this->hasMany(Bestelling::className(), ['menu_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
            'prijs' => 'Prijs',
        ];
    }
}
