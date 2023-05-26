<?php

namespace app\controllers;

use app\models\Death;
use app\models\DeathSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\controllers\Pagination;
use yii\data\ActiveDataProvider;
/**
 * DeathController implements the CRUD actions for Death model.
 */
class DeathController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Death models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DeathSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Death model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Death model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Death();

        if ($model->load($this->request->post()) && $model->save()) {
            $model->d_scanned_image = UploadedFile::getInstance($model, 'd_scanned_image');
            $fileName = $model->fname. '-' .$model->mname. '-' .$model->lname.'.'.$model->d_scanned_image->extension;
            $model->d_scanned_image->saveAs('uploads/' .$fileName);
            $model->d_scanned_image = $fileName;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]); //redirect to view action with created id
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Death model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) ) {
            $oldFile = $model->d_scanned_image; // get the name of the old file

            $model->d_scanned_image = UploadedFile::getInstance($model, 'd_scanned_image'); // retrieve the new file

            if ($model->validate()) {
                if ($model->d_scanned_image) {
                    $fileName = $model->fname. '-' .$model->mname. '-' .$model->lname. '-'. 'new_file_' . time() . '.' . $model->d_scanned_image->extension;
                    $model->d_scanned_image->saveAs('uploads/' . $fileName);
                    $model->d_scanned_image = $fileName;
                }

                if ($model->save()) {
                    if ($oldFile && $oldFile !== $model->d_scanned_image) {
                        unlink('uploads/' . $oldFile); // delete the old file
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('update', [
                'model' => $model,
            ]);    }

    /**
     * Deletes an existing Death model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Death model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Death the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Death::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
