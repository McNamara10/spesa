<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "gruppo".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Prodotti[] $prodottis
 */
class Gruppo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gruppo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdottis()
    {
        return $this->hasMany(Prodotti::className(), ['id_gruppo' => 'id']);
    }
}
