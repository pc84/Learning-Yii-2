<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\State;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['post']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $users = User::getAll();

        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionView($id)
    {
        $user = $this->findModel($id);

        return $this->render('view', [
            'model' => $user,
        ]);
    }

    public function actionCreate()
    {
        $model = new User;
        $view = 'create';

        return $this->createOrUpdate($model, $view);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $view = 'update';

        return $this->createOrUpdate($model, $view);
    }

    private function createOrUpdate($model, $view)
    {

        $loadModelResult = $model->load(Yii::$app->request->post());
        $model->password = User::encryptPassword($model->password);
        $saveResult = $model->save();
        if ($loadModelResult && $saveResult) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $states = $this->getStates();
            return $this->render($view, [
                'model' => $model, 'states' => $states
            ]);
        }
    }

    private function getStates()
    {
        $statesResult = State::find()->all();
        $states = array();

        foreach ($statesResult as $state) {
            $states[$state['id']] = $state['name'];
        }

        return $states;
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect("?r=user/index");
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect("?r=user/index");
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionChart()
    {
        $chartInformation = User::getDataChart();

        return $this->render('chart', [
            'dataProvider' => $chartInformation
        ]);
    }
}
