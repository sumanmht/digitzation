<?php

namespace app\controllers;
use yii;
use app\models\Migrated;
use app\models\MigratedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use app\models\FamilyMember;
/**
 * MigratedController implements the CRUD actions for Migrated model.
 */
class MigratedController extends Controller
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
     * Lists all Migrated models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MigratedSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Migrated model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findmodel($id);
        $mems = $model->mems;
        return $this->render('view', [
            'model' => $model,
            'mems' => $mems,
        ]);
    }

    /**
     * Creates a new Migrated model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Migrated();
        $mems =[new FamilyMember];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $mems = Model::createMultiple(FamilyMember::classname());
                Model::loadMultiple($mems, Yii::$app->request->post());

                // ajax validation
                // if (Yii::$app->request->isAjax) {
                //     Yii::$app->response->format = Response::FORMAT_JSON;
                //     return ArrayHelper::merge(
                //         ActiveForm::validateMultiple($modelsAddress),
                //         ActiveForm::validate($modelCustomer)
                //     );
                // }

                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($mems) && $valid;
                
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($mems as $mem) 
                            {
                                $mem->inf_id = $model->id;
                                if (! ($flag = $mem->save(false))) {
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
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'mems' => (empty($mems)) ? [new FamilyMember] : $mems
        ]);

        
    }

    /**
     * Updates an existing Migrated model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        $mems = $model->mems;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($mems, 'id', 'id');
            $mems = Model::createMultiple(FamilyMember::classname(), $mems);
            Model::loadMultiple($mems, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($mems, 'id', 'id')));

             // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($mems) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Address::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($mems as $mem) {
                            $mem->inf_id = $model->id;
                            if (! ($flag = $mem->save(false))) {
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

        return $this->render('update', [
            'model' => $model,
            'mems' => (empty($mems)) ? [new FamilyMember] : $mems
        ]);
    }

    /**
     * Deletes an existing Migrated model.
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
     * Finds the Migrated model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Migrated the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Migrated::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
