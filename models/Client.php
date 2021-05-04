<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $fio
 * @property string $passport
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'passport'], 'required'],
            [['fio'], 'string', 'max' => 155],
            [['passport'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'passport' => 'Серия и номер паспорта',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable(Issue::tableName(), ['client_id' => 'id']);
    }

    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['client_id' => 'id']);
    }

}
