<?php

namespace app\controllers;

use app\models\UserInfo;
use Yii;
use app\models\CheckRecord;
use app\models\CheckRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckRecordController implements the CRUD actions for CheckRecord model.
 */
class CheckRecordController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout = 'new_layout';


    public $dietOption = array(
        0=>"大鱼大肉",
        1=>"家里吃",
        2=>"很少吃肉,鱼肉为主",
        4=>"素食主义"

    );

    public $motionOption = array(
        0=>"一周至少三天运动",
        1=>"一个月一次运动",
        2=>"最近三个月有运动",
        3=>"最近没有运动"
    );


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
     * Lists all CheckRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "test_layout";
        $searchModel = new CheckRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckRecord model.
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
     * Creates a new CheckRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "blank";
        $request = Yii::$app->request->queryParams;
        if($request!=false){
            $result = array();
            $sql = "insert into check_record (health_id,height,weight,waist,hip,diet,motion)values(
              :health_id,:height,:weight,:waist,:hip,:diet,:motion)";
            $res = Yii::$app->db->createCommand($sql)
                ->bindParam(":health_id",$request["health_id"])
                ->bindParam(":height",$request["height"])
                ->bindParam("weight",$request["weight"])
                ->bindParam(":waist",$request["waist"])
                ->bindParam(":hip",$request["hip"])
                ->bindParam(":diet",$request["diet"])
                ->bindParam(":motion",$request["motion"])
                ->execute();
            return $this->render('create', [
                'data' => $res,
            ]);
        }
    }

    /**
     * Updates an existing CheckRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->health_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CheckRecord model.
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
     * Finds the CheckRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CheckRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCheck(){
        $this->layout = "blank";
        $request = Yii::$app->request->queryParams;
        if($request!=false){
            $result = array();
            if($request["height"] == 0 || $request["hip"]==0){
                return;
            }
            $userInfo = UserInfo::getUserInfo(Yii::$app->user->identity->getId());
            $result["BMI"] = sprintf("%.2f Kg/m2",$request["weight"]/$request["height"]/100);
            $result["WHR"] = sprintf("%.2f",$request["waist"]/$request["hip"]/100);
            if(($request["waist"]>85 && $userInfo->getAttribute("sex")==0)|| ($request["waist"]>85 && $userInfo->getAttribute("sex")==1)){
                $result["is_fat"] = "向心性肥胖";
            }
            return $this->render('check', [
                'data' => $result,
            ]);
        }
    }

}
