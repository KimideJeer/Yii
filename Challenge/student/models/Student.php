<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $naam
 * @property string $klas
 * @property int $minuten_te_laat
 * @property string $reden_te_laat
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam', 'klas', 'minuten_te_laat', 'reden_te_laat'], 'required'],
            [['minuten_te_laat'], 'integer'],
            [['naam'], 'string', 'max' => 30],
            [['klas'], 'string', 'max' => 2],
            [['reden_te_laat'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
            'klas' => 'Klas',
            'minuten_te_laat' => 'Minuten Te Laat',
            'reden_te_laat' => 'Reden Te Laat',
        ];
    }
}
