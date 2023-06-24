<?php

namespace app\controllers;

use app\models\Mig;
use app\models\MigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Fam;
use app\models\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\controllers\Pagination;
use yii\data\ActiveDataProvider;
use kartik\export\ExportMenu;
use kartik\mpdf\Pdf;

/**
 * MigController implements the CRUD actions for Mig model.
 */
class MigController extends Controller
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
     * Lists all Mig models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MigSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mig model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $fams = $model->fams;

        return $this->render('view', [
            'model' => $model,
            'fams' => $fams,
        ]);
    }

    /**
     * Creates a new Mig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mig();
        $fams = [new Fam];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->m_scanned_image = UploadedFile::getInstance($model, 'm_scanned_image');
            $fileName = $model->inf_fname . '-' . $model->inf_mname . '-' . $model->inf_lname . '.' . time() . '.' . $model->m_scanned_image->extension;
            $model->m_scanned_image->saveAs('uploads/' . $fileName);
            $model->m_scanned_image = $fileName;
            $model->save();

            $fams = Model::createMultiple(Fam::classname());
            Model::loadMultiple($fams, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = Model::validateMultiple($fams) && $valid;

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($fams as $fam) {
                            $fam->inf_id = $model->id;
                            if (!($flag = $fam->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'fams' => (empty($fams)) ? [new Fam] : $fams
        ]);
    }

    /**
     * Updates an existing Mig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fams = $model->fams;
        $oldFile = $model->m_scanned_image; // get the name of the old file
        $model->m_scanned_image = UploadedFile::getInstance($model, 'm_scanned_image'); // retrieve the new file
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {


            $oldIDs = ArrayHelper::map($fams, 'id', 'id');
            $fams = Model::createMultiple(Fam::classname(), $fams);
            Model::loadMultiple($fams, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($fams, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($fams) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Fam::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($fams as $fam) {
                            $fam->inf_id = $model->id;
                            if (!($flag = $fam->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    // Handle image update
                    if (UploadedFile::getInstance($model, 'm_scanned_image') != null) {
                        // New file is uploaded
                        $model->m_scanned_image = UploadedFile::getInstance($model, 'm_scanned_image');
                        $fileName = $model->inf_fname . '-' . $model->inf_mname . '-' . $model->inf_lname . '-' . time() . '.' . $model->m_scanned_image->extension;
                        $model->m_scanned_image->saveAs('uploads/' . $fileName);
                        $model->m_scanned_image = $fileName;
                    } elseif ($oldFile != null) {
                        // No new file uploaded, but there is an existing file
                        $model->m_scanned_image = $oldFile; // Assign the existing image file name to the model
                    }
                    // // Handle image update
                    // if (UploadedFile::getInstance($model, 'm_scanned_image') != null) {
                    //     $model->m_scanned_image = UploadedFile::getInstance($model, 'm_scanned_image'); //upload files
                    //     $fileName = $model->inf_fname . '-' . $model->inf_mname . '-' . $model->inf_lname . '-' . time() . '.' . $model->m_scanned_image->extension; //save as timestamp+imageextension
                    //     $model->m_scanned_image->saveAs('uploads/' . $fileName);
                    //     $model->m_scanned_image = $fileName;
                    // } else {
                    //     $model->m_scanned_image = $oldFile; //assign existing image file name to the model
                    // }
                    $model->save();
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'fams' => (empty($fams)) ? [new Fam] : $fams
        ]);
    }

    /**
     * Deletes an existing Mig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $model = Mig::findOne($id);
    //     $model->delete();
    //     return true;
    // }

    public function actionDelete($id)
    {
        $model = Mig::findOne($id);

        if ($model !== null) {
            // Retrieve the related models
            $fams = $model->fams;

            // Delete each related model
            foreach ($fams as $fam) {
                $fam->delete();
            }

            // Delete the main model
            $model->delete();
            return $this->redirect(['index']);
            // Redirect or perform any other necessary actions
        }
    }


    /**
     * Finds the Mig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Mig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mig::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
