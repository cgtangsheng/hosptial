<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use app\models\UserInfo;
use yii\web\Controller;
use app\components\QRcode;
use yii;
class ManageController extends Controller {

    public $layout = "/blank";
    const HOST_URL = "http://zldzbl.cn";

    public function actionIndex() {
        $health_id = Yii::$app->user->getId();
        $userModel = UserInfo::findOne(["health_id"=>$health_id]);
        return $this->render('index',["user"=>$userModel]);
    }

    public function actionStatistic(){
        return $this->render('statistic');
    }
    public function actionLogin(){
        $user_name =  Yii::$app->request->post("user_name",false);
        if($user_name != false){
            return $this->render('login');
        }
        return $this->render('index');
    }

    public function actionGenerateCode(){
        $id = Yii::$app->request->get("id");
        $url = self::HOST_URL."/user/login/in?id=".$id;
        QRcode::png($url, false, 3, 50, 3,false);
        exit;
    }

}