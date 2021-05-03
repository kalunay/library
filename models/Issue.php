<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property int $id
 * @property string $date1
 * @property string $date2
 * @property int $book_id
 * @property int $client_id
 * @property int $employee_id
 *
 * @property Book $book
 * @property Client $client
 * @property Employee $employee
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date1', 'date2', 'book_id', 'client_id', 'employee_id'], 'required'],
            [['date1', 'date2'], 'safe'],
            [['book_id', 'client_id', 'employee_id'], 'default', 'value' => null],
            [['book_id', 'client_id', 'employee_id'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date1' => 'Дата выдачы',
            'date2' => 'Срок выдачи',
            'book_id' => 'Книга',
            'client_id' => 'Клиент',
            'employee_id' => 'Сотрудник',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    public function getBooks(){
        $books = [];
        $list = Book::find()->where(['status' => 0])->all();
        array_walk($list, function ($model) use (&$books) {
            $books[$model->id] = $model->name;
        });
        return $books;
    }

    public function getClients(){
        $clients = [];
        $list = Client::find()->all();
        array_walk($list, function ($model) use (&$clients) {
            $clients[$model->id] = $model->fio;
        });
        return $clients;
    }

    public function getEmployees(){
        $employees = [];
        $list = Employee::find()->all();
        array_walk($list, function ($model) use (&$employees) {
            $employees[$model->id] = $model->fio;
        });
        return $employees;
    }
}
