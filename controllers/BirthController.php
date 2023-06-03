<?php

namespace app\controllers;

use app\models\Birth;
use app\models\BirthSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\controllers\Pagination;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;
use yii;

/**
 * BirthController implements the CRUD actions for Birth model.
 */
class BirthController extends Controller
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
     * Lists all Birth models.
     *
     * @return string
     */

    public function actionIndex()
    {
        $searchModel = new BirthSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // Check if the search form is submitted
        if (!empty(Yii::$app->request->queryParams['BirthSearch']['birthsearch'])) {
            // Perform the search
            $searchModel->birthsearch = Yii::$app->request->queryParams['BirthSearch']['birthsearch'];
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } else {
            // Reset the search attribute
            $searchModel->birthsearch = null;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Birth model.
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
     * Creates a new Birth model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new Birth();

        if ($model->load($this->request->post()) && $model->save()) {
            $model->scanned_image = UploadedFile::getInstance($model, 'scanned_image');
            $fileName = $model->fname . '-' . $model->mname . '-' . $model->lname . '.' . $model->scanned_image->extension;
            $model->scanned_image->saveAs('uploads/' . $fileName);
            $model->scanned_image = $fileName;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]); //redirect to view action with created id
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Birth model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scanned_image = $model->scanned_image;
        //retrieve existing image file name from the database
        $existingImageFileName = $model->scanned_image;
        if ($this->request->isPost && $model->load($this->request->post())) {

            if (UploadedFile::getInstance($model, 'scanned_image') != null) {
                $model->scanned_image = UploadedFile::getInstance($model, 'scanned_image'); //upload files
                $fileName = $model->fname . '-' . $model->mname . '-' . $model->lname . '.' . $model->scanned_image->extension; //save as timestamp+imageextension
                $model->scanned_image->saveAs('uploads/' . $fileName); //save in directory
                $model->scanned_image = $fileName; //save in database
            } else {
                $model->scanned_image = $existingImageFileName; //assign existing image file name to the model
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Birth model.
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
     * Finds the Birth model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Birth the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Birth::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExport()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Birth::find(),
            'pagination' => false
        ]);
        $data = Birth::find()->asArray()->all();
        foreach ($data as &$row) {
            $row['ठेगाना'] = $row['p_muni'] . '-' . $row['p_ward'] . ', ' . $row['p_district'];
            unset($row['p_ward']);
            unset($row['p_district']);
            unset($row['p_muni']);

            $row['Registration Number'] = $row['reg_no'];
            unset($row['reg_no']);
            unset($row['father_living_count']);
            unset($row['father_birth_count']);
            unset($row['father_age_when_birth']);
            unset($row['mother_living_count']);
            unset($row['mother_birth_count']);
            unset($row['mother_age_when_birth']);
            unset($row['scanned_image']);

            $row['दर्ता मिति(वि.स.)'] = $row['reg_year'] . '-' . $row['reg_month'] . '-' . $row['reg_day'];
            unset($row['reg_year']);
            unset($row['reg_month']);
            unset($row['reg_day']);

            $row['स्थानीय पञ्जिकाधिकारी'] = $row['registrar_name'];
            unset($row['registrar_name']);

            $row['शिशुको नाम'] = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
            unset($row['id']);
            unset($row['fname']);
            unset($row['mname']);
            unset($row['lname']);

            $row['जन्म मिति(वि.स.)'] = $row['birth_year'] . '-' . $row['birth_month'] . '-' . $row['birth_day'];
            unset($row['birth_year']);
            unset($row['birth_month']);
            unset($row['birth_day']);

            $row['जन्म स्थान'] = $row['birth_place'];
            unset($row['birth_place']);

            $row['जन्म किसिम'] = $row['birth_type'];
            unset($row['birth_type']);

            $row['लिङ्ग'] = $row['gender'];
            unset($row['gender']);

            $row['जन्मेको देश'] = $row['bith_country'];
            unset($row['bith_country']);

            $row['जन्मदाता'] = $row['helper'];
            unset($row['helper']);

            $row['बाजेको नाम'] = $row['grandfather_fname'] . '-' . $row['grandfather_mname'] . '-' . $row['grandfather_lname'];
            unset($row['grandfather_fname']);
            unset($row['grandfather_mname']);
            unset($row['grandfather_lname']);

            $row['विहे भएको साल'] = $row['married_year'];
            unset($row['married_year']);

            $row['बाबुको नाम'] = $row['father_fname'] . '-' . $row['father_mname'] . '-' . $row['father_lname'];
            unset($row['father_fname']);
            unset($row['father_mname']);
            unset($row['father_lname']);

            $row['बाबुको नागरिकता'] = $row['father_ctz_no'];
            unset($row['father_ctz_no']);

            $row['बाबुको नागरिकता जारी मिति(वि.स.)'] = $row['father_ctz_year'] . '-' . $row['father_ctz_month'] . '-' . $row['father_ctz_day'];
            unset($row['father_ctz_year']);
            unset($row['father_ctz_month']);
            unset($row['father_ctz_day']);

            $row['बाबुको नागरिकता जारी जिल्ला'] = $row['father_ctz_district'];
            unset($row['father_ctz_district']);

            $row['बाबुको स्थायी ठेगाना'] = $row['father_permanent_address'];
            unset($row['father_permanent_address']);

            $row['बाबुको धर्म'] = $row['father_religion'];
            unset($row['father_religion']);

            $row['बाबुको शैक्षिक योग्यता'] = $row['father_education'];
            unset($row['father_education']);

            $row['बाबुको मातृ भाषा'] = $row['father_mother_tongue'];
            unset($row['father_mother_tongue']);

            $row['आमाको नाम'] = $row['mother_fname'] . '-' . $row['mother_mname'] . '-' . $row['mother_lname'];
            unset($row['mother_fname']);
            unset($row['mother_mname']);
            unset($row['mother_lname']);

            $row['आमाको नागरिकता'] = $row['mother_ctz_no'];
            unset($row['mother_ctz_no']);

            $row['आमाको नागरिकता जारी मिति(वि.स.)'] = $row['mother_ctz_year'] . '-' . $row['mother_ctz_month'] . '-' . $row['mother_ctz_day'];
            unset($row['mother_ctz_year']);
            unset($row['mother_ctz_month']);
            unset($row['mother_ctz_day']);

            $row['आमाको नागरिकता जारी जिल्ला'] = $row['mother_ctz_district'];
            unset($row['mother_ctz_district']);

            $row['आमाको स्थायी ठेगाना'] = $row['mother_permanent_address'];
            unset($row['mother_permanent_address']);

            $row['आमाको धर्म'] = $row['mother_religion'];
            unset($row['mother_religion']);

            $row['आमाको शैक्षिक योग्यता'] = $row['mother_education'];
            unset($row['mother_education']);

            $row['आमाको मातृ भाषा'] = $row['mother_mother_tongue'];
            unset($row['mother_mother_tongue']);

            $row['सूचकको नाम'] = $row['informant_fname'] . '-' . $row['informant_mname'] . '-' . $row['informant_lname'];
            unset($row['informant_fname']);
            unset($row['informant_mname']);
            unset($row['informant_lname']);

            $row['शिशुसँगको नाता'] = $row['relation'];
            unset($row['relation']);

            $row['सूचकको नागरिकता'] = $row['inf_ctz_no'];
            unset($row['inf_ctz_no']);

            $row['सूचकको नागरिकता जारी मिति(वि.स.)'] = $row['inf_ctz_year'] . '-' . $row['inf_ctz_month'] . '-' . $row['inf_ctz_day'];
            unset($row['inf_ctz_year']);
            unset($row['inf_ctz_month']);
            unset($row['inf_ctz_day']);

            $row['सूचकको नागरिकता जारी जिल्ला'] = $row['inf_ctz_district'];
            unset($row['inf_ctz_district']);
        }
        $fileName = 'export.csv';
        $file = fopen('php://memory', 'w');
        fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
        fputcsv($file, array_keys($data[0]));
        foreach ($data as $fields) {
            fputcsv($file, $fields);
        }
        rewind($file);
        \Yii::$app->response->sendStreamAsFile($file, $fileName);
        //Yii::$app->response->sendFile($fileName, file_get_contents($file));

    }

    public function actionPrintpdf($id)
    {

        $model = Birth::findOne($id);
        $content = $this->renderPartial('printpdf', ['model' => $model]);
        $pdf = new Pdf([
            //'class' => '\kartik\mpdf\Pdf',
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'format' => Pdf::FORMAT_A4,
            // 'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            // 'watermark' => 'DRAFT',
            // 'showWatermark' => true,
            'orientation' => 'landscape',
            'cssInline' => '*,body{font-family: freeserif;font-size:12pt;}',
            'options' => [
                // any mpdf options you wish to set
                'default_font' => ' freeserif',
                //'autoScriptToLang' => true,
                'encoding' => 'UTF-8'
            ],
            'methods' => [
                'setTitle' => $model->fname . ' ' . $model->mname . ' ' . $model->lname,
                //'SetHeader' => ['Generated On: ' . date("D,Y-m-d")],
                //'SetFooter' => ['|Page {PAGENO}/{nb}|'],
            ]
        ]);
        $pdf->getApi()->SetAutoPageBreak(false);
        // $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        // $fontDirs = $defaultConfig['fontDir'];

        // $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        // $fontData = $defaultFontConfig['fontdata'];

        return $pdf->render();
    }
}
