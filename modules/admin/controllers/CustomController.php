<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
class CustomController extends Controller {
    public function actionGreet() {
        return $this->render('greet');
    }
}