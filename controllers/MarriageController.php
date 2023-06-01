<?php

namespace app\controllers;

use app\models\Marriage;
use app\models\MarriageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * MarriageController implements the CRUD actions for Marriage model.
 */
class MarriageController extends Controller
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
     * Lists all Marriage models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MarriageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marriage model.
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
     * Creates a new Marriage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Marriage();

        if ($model->load($this->request->post()) && $model->save()) {
            $model->ma_scanned_image = UploadedFile::getInstance($model, 'ma_scanned_image');
            $fileName = $model->groom_fname. '-' .$model->bride_fname. '-' .$model->groom_lname.'.'.$model->ma_scanned_image->extension;
            $model->ma_scanned_image->saveAs('uploads/' .$fileName);
            $model->ma_scanned_image = $fileName;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]); //redirect to view action with created id
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Marriage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->ma_scanned_image = $model->ma_scanned_image;
        //retrieve existing image file name from the database
        $existingImageFileName = $model->ma_scanned_image; 
        if ($this->request->isPost && $model->load($this->request->post()) ) {

            if(UploadedFile::getInstance($model, 'ma_scanned_image')!=null){
                $model->ma_scanned_image = UploadedFile::getInstance($model, 'ma_scanned_image'); //upload files
                $fileName = $model->groom_fname. '-' .$model->bride_fname. '-' .$model->groom_lname.'.'.$model->ma_scanned_image->extension; //save as timestamp+imageextension
                $model->ma_scanned_image->saveAs('uploads/' .$fileName); //save in directory
                $model->ma_scanned_image = $fileName; //save in database
            }
            else{
                $model->ma_scanned_image = $existingImageFileName; //assign existing image file name to the model
            }
            $model->save();   
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Marriage model.
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
     * Finds the Marriage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Marriage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marriage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
