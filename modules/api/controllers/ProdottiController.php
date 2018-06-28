<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\Prodotti;
use yii\filters\AccessRule;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * ProdottiController implements the CRUD actions for Prodotti model.
 */
class ProdottiController extends Controller
{

    public $enableCsrfValidation = false;


    /**
     * Lists all Prodotti models.
     * @return mixed
     */
    public function actionIndex()
    {
        echo 'this is a test';exit;
    }

    public function actionLista()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $prodotti = Prodotti::find()->all();

            if(count ($prodotti) >0)
                {
                    return $prodotti;
                }
                else
                {
                    return array('status'=>false,'data'=>'Non ci sono prodotti');
                }

    }

    /**
     * Displays a single Prodotti model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prodotti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $prodotto = new Prodotti();
        $prodotto->scenario = Prodotti::SCENARIO_CREATE;
        $data = $prodotto->attributes= \Yii::$app->request->post();
        $prodotto->load($data,'');
        if($prodotto->validate())
        {
            $prodotto->save();
            return array('status'=> true);

        }
        else
        {
            return array('status'=> false, 'data'=>$prodotto->getErrors());
        }
    }

    public function actionDetailsprodotti($id_gruppo)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $prodotti = Prodotti::find()->where(['id_gruppo' => $id_gruppo])->all();
            if(count ($prodotti) >0)
            {
                return $prodotti;
            }
            else
            {
                return array('status'=>false,'data'=>'Non ci sono prodotti per questo gruppo');
            }


    }



    /**
     * Updates an existing Prodotti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prodotti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prodotti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prodotti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prodotti::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
