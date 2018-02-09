<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\ocr\OcrTest;

/**
 * UserController implements the CRUD actions for User model.
 */
class LaboratoryController extends Controller
{
    public $layout = "blank";

    const HOST_URL = "http://127.0.0.1/images/";

    public function actionIndex(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect('/site/login');
        }

        return $this->render('index',[
        ]);
    }

    public function actionUpload(){
        $filename = iconv('UTF-8', 'GBK', $_FILES['file']['name']);
        $fileTail = explode(".",$filename);
        $fileType = $fileTail[count($fileTail)-1];
        $newFileName =  md5($filename).".$fileType";
        if ($filename) {
            $ret = move_uploaded_file($_FILES["file"]["tmp_name"],
                "/home/work/images/" .$newFileName);
            $url = Yii::$app->params["hostUrl"]."/".$newFileName;
            return $this->render("upload",["ret"=>$ret,"url"=>$url]);
        }
    }

    public function actionCheck(){
        $request = Yii::$app->request->queryParams;
        $url = $request["url"];
        $res = OcrTest::checkByGeneral($url);
        return $this->render("check",["ret"=>$res,"url"=>$url]);
    }
}