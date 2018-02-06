<?php

namespace app\controllers;

use app\models\UserInfo;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout = 'blank';

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        if(Yii::$app->user->isGuest){
            $this->redirect('/site/login',301);
            return;
        }
        $data = $searchModel->getUserInfo(Yii::$app->user->identity->getId());
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data'=>$data
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout="blank";
        $model = new User();
        $id = Yii::$app->request->get("id");
        $request = Yii::$app->request->post();
        if($request!=false){
            $data = User::findOne(["username"=>$request["username"]]);
            if($data == false){
                $model->username = $request["username"];
                $model->password = $request["password"];
                if ($model->save()) {
                    return $this->redirect(['/site/login', 'id' => $id]);
                } else {
                    return $this->render('/user/create', [
                        'model' => $model,
                        'error'=>false
                    ]);
                }
            }else{
                return $this->render('/user/create', [
                    'error' => "当前手机号已经存在"
                ]);
            }
        }
        return $this->render('/user/create', [
            'model' => $model,
            'error'=>false
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCenter() {
        $model = new UserInfo();
        if(Yii::$app->user->identity->getId()==false){
            return $this->redirect("/site/login");
        }
        $model = UserInfo::findOne(["health_id"=>Yii::$app->user->identity->getId()]);
        return $this->render('center', [
            'model' => $model,
        ]);
    }

    public function actionEdit(){
        $heath_id = Yii::$app->user->identity->getId();
        $model = new UserInfo();
        $userInfo = $model->getUserInfo($heath_id);
        return $this->render("edit",["data"=>$userInfo]);
    }

    public function actionSave(){
        $heath_id = Yii::$app->user->identity->getId();
        $model = UserInfo::findOne(["health_id",$heath_id]);
        if($model == NULL){
            $model = new UserInfo();
        }
        $input = Yii::$app->request->get();
        $model->health_id =  $heath_id;
        $model->name = $input["name"];
        $model->birthday = $input["birthday"];
        $model->weight = intval($input["weight"]);
        $model->height = intval($input["height"]);
        $model->identify = $input["identify"];
        $model->tel = $input["tel"];
        if($model->save()){
            return $this->redirect("/site/index");
        }

        return $this->render("edit",["data"=>array()]);
    }
}
