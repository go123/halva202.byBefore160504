<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
// use common\models\LoginForm;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

use backend\models\SignupForm;

use app\models\Userprofile2;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'signup'],
                        'allow' => true,
                        // 'roles' => ['@'],
						'roles' => ['moder'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
				
				//дополню данными таблицу userprofile
					// узнаем запись с последним (только что вставленным) id 
					$idUser = Yii::$app->db->getLastInsertID();
					// insert в другую таблицу
					$model2=new Userprofile2;
					$model2->user_id = $idUser;
					// $model2->usernameUser = $username;
					$model2->insert();
				
				return $this->render('userCreated');
				
                /* if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                } */
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
