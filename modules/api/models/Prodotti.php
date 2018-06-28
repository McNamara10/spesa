<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "prodotti".
 *
 * @property int $id
 * @property int $id_gruppo
 * @property string $nome
 * @property double $prezzo
 *
 * @property Gruppo $gruppo
 */
class Prodotti extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE ='create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodotti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gruppo', 'nome'], 'required'],
            [['nome'],'unique'],
            [['id_gruppo'], 'integer'],
            [['prezzo'], 'number'],
            [['nome'], 'string', 'max' => 255],
            [['id_gruppo'], 'exist', 'skipOnError' => true, 'targetClass' => Gruppo::className(), 'targetAttribute' => ['id_gruppo' => 'id']],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['nome','id_gruppo'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gruppo' => 'Id Gruppo',
            'nome' => 'Nome',
            'prezzo' => 'Prezzo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruppo()
    {
        return $this->hasOne(Gruppo::className(), ['id' => 'id_gruppo']);
    }

// Use beforeAction to disable CSRF validation
// only in actions that are called with REST
// do not disable global CSRF validation


}
