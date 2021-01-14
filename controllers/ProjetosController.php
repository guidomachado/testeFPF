<?php

namespace app\controllers;

use app\models\Calc;
use Yii;
use app\models\Projetos;
use app\models\ProjetosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SimularModel;

/**
 * ProjetosController implements the CRUD actions for Projetos model.
 */
class ProjetosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projetos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjetosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projetos model.
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
     * Creates a new Projetos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projetos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Projetos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Projetos model.
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
     * Finds the Projetos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projetos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projetos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /* O controlador actionSimular é responsável por receber o id do projeto atual chamar o *formulário que coleta o valor de investimento do cliente e passa esses dados pelo *método POST para o usuário confirmar sua visualizar seu investimento. 
    * 
    * @param integer $id
    * @return mixed : Retorno1: Quando for carregado os dados e passados pelo POST.
    *                 Retorno2: Continua chamando a view do formulário.
    */
    public function actionSimular($id){

        $model1 = $this->findModel($id);
        $simularModel = new SimularModel;
        $post = Yii::$app->request->post();
        if($simularModel->load($post) && $simularModel->validate()) {
            return $this->render('confirmar_simu', [
                'model' => $simularModel,
                'model1' => $model1,
            ]);
        }
        else{
            return $this->render('simular', [
                'model' => $simularModel,
                'model1' => $model1,
            ]);
        } 

    }
    /* O controlador actionConfirmar_simu é responsável por receber o id do projeto atual e *chamar o formulário principal com os dados de investimento e retorno do cliente *atualizados, além do usuário confirmar se quer enviar seu investimento para o projeto. 
    * 
    * @param integer $id
    * @return mixed : Retorno1: Quando for carregado os dados e passados pelo POST.
    *                 Retorno2: Continua chamando a view do formulário atual.
    */
    public function actionConfirmar_simu($id)
    {
        $model = $this->findModel($id);
        //$this->findModel($id)->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('confirmar_simu', [
            'model' => $model,
        ]);
    }
}
