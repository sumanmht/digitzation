<?php

namespace app\controllers;

use app\models\Divorce;
use app\models\DivorceSearch;
use app\models\Municipality;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii;
use app\models\Ward;
use app\models\District;
use Mpdf\Tag\Form;
use yii\helpers\Json;
use yii\web\ForbiddenHttpException;

/**
 * DivorceController implements the CRUD actions for Divorce model.
 */
class DivorceController extends Controller
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
     * Lists all Divorce models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DivorceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Divorce model.
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
     * Creates a new Divorce model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-birth')) {
            $model = new Divorce();

            if ($model->load($this->request->post()) && $model->save()) {
                $model->di_scanned_image = UploadedFile::getInstance($model, 'di_scanned_image');
                $fileName = $model->groom_fname . '-' . $model->groom_mname . '-' . $model->bride_lname . '.' . $model->di_scanned_image->extension;
                $model->di_scanned_image->saveAs('uploads/' . $fileName);
                $model->di_scanned_image = $fileName;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]); //redirect to view action with created id
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Divorce model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-birth')) {
            $model = $this->findModel($id);
            $model->di_scanned_image = $model->di_scanned_image;
            //retrieve existing image file name from the database
            $existingImageFileName = $model->di_scanned_image;
            if ($this->request->isPost && $model->load($this->request->post())) {

                if (UploadedFile::getInstance($model, 'di_scanned_image') != null) {
                    $model->di_scanned_image = UploadedFile::getInstance($model, 'di_scanned_image'); //upload files
                    $fileName = $model->groom_fname . '-' . $model->groom_mname . '-' . $model->bride_lname . '.' . $model->di_scanned_image->extension; //save as timestamp+imageextension
                    $model->di_scanned_image->saveAs('uploads/' . $fileName); //save in directory
                    $model->di_scanned_image = $fileName; //save in database
                } else {
                    $model->di_scanned_image = $existingImageFileName; //assign existing image file name to the model
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Divorce model.
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
     * Finds the Divorce model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Divorce the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Divorce::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMunicipality($id)
    {

        $muns = Municipality::find()->where(['district_id' => $id])->all();
        $opts = '<option value="">गा.पा/न.पा</option>';
        foreach ($muns as $mun) {
            $opts .= '<option value="' . $mun->district_id . '">' . $mun->name . '</option>';
        }

        echo $opts;
        Yii::$app->end();
    }


    public function actionWard($id)
    {

        $wards = Ward::find()->where(['local_level_id' => $id])->all();

        $options = '<option value="">वडा नं</option>';
        foreach ($wards as $ward) {
            $options .= '<option value="' . $ward->local_level_id . '">' . $ward->number . '</option>';
        }

        echo $options;
        Yii::$app->end();
    }
}
