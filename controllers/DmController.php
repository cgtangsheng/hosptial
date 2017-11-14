<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class DmController extends Controller
{


    public $layout = "blank";

    public function actionIndex(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect('/site/login');
        }

        return $this->render('index',[
        ]);
    }

    public function actionCheck(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect('/site/login');
        }
        $param = Yii::$app->request->queryParams;
        $result = array();
        //检查BMI指数
        $data = $this->checkBmiInfo($param);
        $result = array_merge($result,$data);
        //评估饮食状况
        $data = $this->checkDietInfo($param);
        $result = array_merge($result,$data);

        return $this->render('check',["data"=>$result]);
    }

    public function checkDietInfo($param){
        $data = array();
        $diet_desc = array();
        switch ($param["work_density"]){
            case 0:
                if($param["diet"]>5){
                    $diet_desc[]="主食太多";
                }
                break;
            case 1:
                if($param["diet"]>6){
                    $diet_desc[]="主食太多";
                }
                break;
            case 2:
                if($param["diet"]>8){
                    $diet_desc[]="主食太多";
                }
                break;
        }
        if($param["vegetables"]<10){
            $diet_desc[]="蔬菜摄入太少";
        }
        if($param["milk"]<250){
            $diet_desc[]="牛奶摄入太少";
        }
        if($param["egg"]<1){
            $diet_desc[]="鸡蛋摄入太少";
        }
        if($param["meet"]<2){
            $diet_desc[]="瘦肉摄入太少";
        }
        if($param["bean"]<1){
            $diet_desc[]="豆制品摄入太少";
        }elseif($param["bean"]>2){
            $diet_desc[]="豆制品摄入太多";
        }
        if($param["oil"]>3){
            $diet_desc[]="食用油摄入太多";
        }
        if($param["salt"]>6){
            $diet_desc[]="盐摄入太多";
        }
        $data["diet_info"]=$diet_desc;
        return $data;
    }

    public function checkBmiInfo($param){
        $data = array();
        if($param["height"]!=false && $param["weight"]!=false){
            $data["bmi"]=sprintf("%0.2f",floatval($param["weight"])/floatval($param["height"])*floatval($param["height"]));
        }
        if($data["bmi"]<18){
            $data["bmi_desc"]="体重不足";
        }else if($data["bmi"]>=18 && $data["bmi"]<=22.9){
            $data["bmi_desc"]="体重正常";
        }else if($data["bmi"]>22.9 && $data["bmi"]<25){
            $data["bmi_desc"]="一般超重";
        }else if($data["bmi"]>=25 && $data["bmi"]<=29.9){
            $data["bmi_desc"]="肥胖前期";
        }
        else if($data["bmi"]>29.9 && $data["bmi"]<=34.9){
            $data["bmi_desc"]="肥胖I期";
        }
        else if($data["bmi"]>34.9 && $data["bmi"]<39.9){
            $data["bmi_desc"]="肥胖II期";
        }
        else if($data["bmi"]>39.9){
            $data["bmi_desc"]="肥胖III期";
        }
        if($param["hip"]!=false && $param["waistline"]!=false){
            $data["hip_waistline"]=sprintf("%0.2f",floatval($param["waistline"])/floatval($param["hip"]));
        }
        if($param["sex"] == 0 && $param["waistline"]>85 || $param["sex"] == 1 && $param["waistline"]>80){
            $data["waistline_desc"]="潜在向心型肥胖";
        }
        return $data;
    }

}