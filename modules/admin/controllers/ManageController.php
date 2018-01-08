<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii;
class ManageController extends Controller {

    public $layout = "/blank";

    public function actionIndex() {
        return $this->render('index');
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
}