<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Birth;
use app\models\BirthSearch;
use app\models\Marriage;
use app\models\Divorce;
use app\models\Mig;
use app\models\Fam;
use app\models\Death;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'LoginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    // public function actionLogin()
    // {
    //     $this->layout = 'LoginLayout';
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }

    //     $model = new LoginForm();

    //     if ($model->load(Yii::$app->request->post())) {
    //         if ($model->login()) {
    //             return $this->goBack();
    //         }
    //     }

    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionIndex()
    {

        $birth1 =  Birth::find()->where(['p_ward' => '१'])->count();
        $birth2 =  Birth::find()->where(['p_ward' => '२'])->count();
        $birth3 =  Birth::find()->where(['p_ward' => '३'])->count();
        $birth4 =  Birth::find()->where(['p_ward' => '४'])->count();
        $birth5 =  Birth::find()->where(['p_ward' => '५'])->count();
        $birth6 =  Birth::find()->where(['p_ward' => '६'])->count();
        $birth7 =  Birth::find()->where(['p_ward' => '७'])->count();
        $birth8 =  Birth::find()->where(['p_ward' => '८'])->count();
        $birth9 =  Birth::find()->where(['p_ward' => '९'])->count();
        $birth10 = Birth::find()->where(['p_ward' => '१०'])->count();
        $birth11 = Birth::find()->where(['p_ward' => '११'])->count();
        $birth12 = Birth::find()->where(['p_ward' => '१२'])->count();
        $birth13 = Birth::find()->where(['p_ward' => '१३'])->count();
        $birth14 = Birth::find()->where(['p_ward' => '१४'])->count();
        $birth15 = Birth::find()->where(['p_ward' => '१५'])->count();
        $birth16 = Birth::find()->where(['p_ward' => '१६'])->count();

        $marriage1 =  Marriage::find()->where(['ward' => '१'])->count();
        $marriage2 =  Marriage::find()->where(['ward' => '२'])->count();
        $marriage3 =  Marriage::find()->where(['ward' => '३'])->count();
        $marriage4 =  Marriage::find()->where(['ward' => '४'])->count();
        $marriage5 =  Marriage::find()->where(['ward' => '५'])->count();
        $marriage6 =  Marriage::find()->where(['ward' => '६'])->count();
        $marriage7 =  Marriage::find()->where(['ward' => '७'])->count();
        $marriage8 =  Marriage::find()->where(['ward' => '८'])->count();
        $marriage9 =  Marriage::find()->where(['ward' => '९'])->count();
        $marriage10 = Marriage::find()->where(['ward' => '१०'])->count();
        $marriage11 = Marriage::find()->where(['ward' => '११'])->count();
        $marriage12 = Marriage::find()->where(['ward' => '१२'])->count();
        $marriage13 = Marriage::find()->where(['ward' => '१३'])->count();
        $marriage14 = Marriage::find()->where(['ward' => '१४'])->count();
        $marriage15 = Marriage::find()->where(['ward' => '१५'])->count();
        $marriage16 = Marriage::find()->where(['ward' => '१६'])->count();

        $death1 =  Death::find()->where(['ward' => '१'])->count();
        $death2 =  Death::find()->where(['ward' => '२'])->count();
        $death3 =  Death::find()->where(['ward' => '३'])->count();
        $death4 =  Death::find()->where(['ward' => '४'])->count();
        $death5 =  Death::find()->where(['ward' => '५'])->count();
        $death6 =  Death::find()->where(['ward' => '६'])->count();
        $death7 =  Death::find()->where(['ward' => '७'])->count();
        $death8 =  Death::find()->where(['ward' => '८'])->count();
        $death9 =  Death::find()->where(['ward' => '९'])->count();
        $death10 = Death::find()->where(['ward' => '१०'])->count();
        $death11 = Death::find()->where(['ward' => '११'])->count();
        $death12 = Death::find()->where(['ward' => '१२'])->count();
        $death13 = Death::find()->where(['ward' => '१३'])->count();
        $death14 = Death::find()->where(['ward' => '१४'])->count();
        $death15 = Death::find()->where(['ward' => '१५'])->count();
        $death16 = Death::find()->where(['ward' => '१६'])->count();

        $migration1 =  Mig::find()->where(['ward' => '१'])->count();
        $migration2 =  Mig::find()->where(['ward' => '२'])->count();
        $migration3 =  Mig::find()->where(['ward' => '३'])->count();
        $migration4 =  Mig::find()->where(['ward' => '४'])->count();
        $migration5 =  Mig::find()->where(['ward' => '५'])->count();
        $migration6 =  Mig::find()->where(['ward' => '६'])->count();
        $migration7 =  Mig::find()->where(['ward' => '७'])->count();
        $migration8 =  Mig::find()->where(['ward' => '८'])->count();
        $migration9 =  Mig::find()->where(['ward' => '९'])->count();
        $migration10 = Mig::find()->where(['ward' => '१०'])->count();
        $migration11 = Mig::find()->where(['ward' => '११'])->count();
        $migration12 = Mig::find()->where(['ward' => '१२'])->count();
        $migration13 = Mig::find()->where(['ward' => '१३'])->count();
        $migration14 = Mig::find()->where(['ward' => '१४'])->count();
        $migration15 = Mig::find()->where(['ward' => '१५'])->count();
        $migration16 = Mig::find()->where(['ward' => '१६'])->count();

        $divorce1 =  Divorce::find()->where(['ward' => '१'])->count();
        $divorce2 =  Divorce::find()->where(['ward' => '२'])->count();
        $divorce3 =  Divorce::find()->where(['ward' => '३'])->count();
        $divorce4 =  Divorce::find()->where(['ward' => '४'])->count();
        $divorce5 =  Divorce::find()->where(['ward' => '५'])->count();
        $divorce6 =  Divorce::find()->where(['ward' => '६'])->count();
        $divorce7 =  Divorce::find()->where(['ward' => '७'])->count();
        $divorce8 =  Divorce::find()->where(['ward' => '८'])->count();
        $divorce9 =  Divorce::find()->where(['ward' => '९'])->count();
        $divorce10 = Divorce::find()->where(['ward' => '१०'])->count();
        $divorce11 = Divorce::find()->where(['ward' => '११'])->count();
        $divorce12 = Divorce::find()->where(['ward' => '१२'])->count();
        $divorce13 = Divorce::find()->where(['ward' => '१३'])->count();
        $divorce14 = Divorce::find()->where(['ward' => '१४'])->count();
        $divorce15 = Divorce::find()->where(['ward' => '१५'])->count();
        $divorce16 = Divorce::find()->where(['ward' => '१६'])->count();

        return $this->render('index', [
            'birth1' => $birth1,
            'birth2' => $birth2,
            'birth3' => $birth3,
            'birth4' => $birth4,
            'birth5' => $birth5,
            'birth6' => $birth6,
            'birth7' => $birth7,
            'birth8' => $birth8,
            'birth9' => $birth9,
            'birth10' => $birth10,
            'birth11' => $birth11,
            'birth12' => $birth12,
            'birth13' => $birth13,
            'birth14' => $birth14,
            'birth15' => $birth15,
            'birth16' => $birth16,

            'marriage1' => $marriage1,
            'marriage2' => $marriage2,
            'marriage3' => $marriage3,
            'marriage4' => $marriage4,
            'marriage5' => $marriage5,
            'marriage6' => $marriage6,
            'marriage7' => $marriage7,
            'marriage8' => $marriage8,
            'marriage9' => $marriage9,
            'marriage10' => $marriage10,
            'marriage11' => $marriage11,
            'marriage12' => $marriage12,
            'marriage13' => $marriage13,
            'marriage14' => $marriage14,
            'marriage15' => $marriage15,
            'marriage16' => $marriage16,

            'death1' => $death1,
            'death2' => $death2,
            'death3' => $death3,
            'death4' => $death4,
            'death5' => $death5,
            'death6' => $death6,
            'death7' => $death7,
            'death8' => $death8,
            'death9' => $death9,
            'death10' => $death10,
            'death11' => $death11,
            'death12' => $death12,
            'death13' => $death13,
            'death14' => $death14,
            'death15' => $death15,
            'death16' => $death16,

            'migration1' => $migration1,
            'migration2' => $migration2,
            'migration3' => $migration3,
            'migration4' => $migration4,
            'migration5' => $migration5,
            'migration6' => $migration6,
            'migration7' => $migration7,
            'migration8' => $migration8,
            'migration9' => $migration9,
            'migration10' => $migration10,
            'migration11' => $migration11,
            'migration12' => $migration12,
            'migration13' => $migration13,
            'migration14' => $migration14,
            'migration15' => $migration15,
            'migration16' => $migration16,

            'divorce1' => $divorce1,
            'divorce2' => $divorce2,
            'divorce3' => $divorce3,
            'divorce4' => $divorce4,
            'divorce5' => $divorce5,
            'divorce6' => $divorce6,
            'divorce7' => $divorce7,
            'divorce8' => $divorce8,
            'divorce9' => $divorce9,
            'divorce10' => $divorce10,
            'divorce11' => $divorce11,
            'divorce12' => $divorce12,
            'divorce13' => $divorce13,
            'divorce14' => $divorce14,
            'divorce15' => $divorce15,
            'divorce16' => $divorce16,

        ]);
    }
}
