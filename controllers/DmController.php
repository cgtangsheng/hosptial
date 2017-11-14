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
//var_dump(json_encode($result));
//exit;
        return $this->render('check',["data"=>$result]);
    }

    public function checkDietInfo($param){
        $data = array();
        $diet_desc = array();
        switch ($param["work_density"]){
            case 0:
                if($param["diet"]>5){
                    $diet_desc[]=array(
                        "label"=>"主食",
                        "desc"=>"主食太多",
                        "standard"=>"轻体力劳动每日摄入标准4~5两",
                        "value"=>$param["diet"],
                    );
                }
                break;
            case 1:
                if($param["diet"]>6){
                    $diet_desc[]=array(
                        "label"=>"主食",
                        "desc"=>"主食太多",
                        "standard"=>"轻体力劳动每日摄入标准5~6两",
                        "value"=>$param["diet"],
                    );
                }
                break;
            case 2:
                if($param["diet"]>8){
                    $diet_desc[]=array(
                        "label"=>"主食",
                        "desc"=>"主食太多",
                        "standard"=>"中体力劳动每日摄入标准6~8两",
                        "value"=>$param["diet"],

                    );
                }
                break;
        }
        if($param["vegetables"]<10){
            $diet_desc[]=array(
                "label"=>"蔬菜",
                "desc"=>"蔬菜摄入太少",
                "standard"=>"一市斤以上",
                "value"=>$param["vegetables"],
            );
        }
        if($param["milk"]<250){
            $diet_desc[]=array(
                "label"=>"牛奶",
                "desc"=>"牛奶摄入太少",
                "standard"=>"250ml",
                "value"=>$param["milk"],
            );
        }
        if($param["egg"]<1){
            $diet_desc[]=array(
                "label"=>"蛋类",
                "desc"=>"蛋类摄入太少",
                "standard"=>"1个",
                "value"=>$param["egg"],
            );
        }
        if($param["meet"]!=false&&$param["meet"]<2){
            $diet_desc[]=array(
                "label"=>"瘦肉",
                "desc"=>"瘦肉摄入太少",
                "standard"=>"2两",
                "value"=>$param["meet"],
            );
        }
        if($param["bean"]!=false&&$param["bean"]<1){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太少",
                "standard"=>"1~2两",
                "value"=>$param["bean"],
            );
        }elseif($param["bean"]>2){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>$param["bean"],
            );
        }
        if($param["oil"]>3){
            $diet_desc[]=array(
                "label"=>"食用油",
                "desc"=>"食用油摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>$param["oil"],
            );
        }
        if($param["salt"]>6){
            $diet_desc[]=array(
                "label"=>"食盐",
                "desc"=>"盐摄入太多",
                "standard"=>"每日摄入标准不超过g",
                "value"=>$param["salt"],
            );
        }
        return $diet_desc;
    }

    public function checkBmiInfo($param){
        $data = array();
        $bmi=0;
        if($param["height"]!=false && $param["weight"]!=false){
            $bmi=sprintf("%0.2f",floatval($param["weight"])/floatval($param["height"])*floatval($param["height"]));
        }
        if($bmi<18){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"体重不足",
                "value"=>$bmi,
                "standard"=>"18~22.9"
            );
        }else if($bmi>=18 && $bmi<=22.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"体重正常",
                "value"=>$bmi,
                "standard"=>"18~22.9"
            );
        }else if($bmi>22.9 && $bmi<25){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"一般超重",
                "standard"=>"22.9~25",
                "value"=>$bmi,
            );
        }else if($bmi>=25 && $bmi<=29.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖前期",
                "standard"=>"25~29.9",
                "value"=>$bmi,
            );
        }
        else if($bmi>29.9 && $bmi<=34.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖I期",
                "standard"=>"29.9~34.9",
                "value"=>$bmi,
            );
        }
        else if($bmi>34.9 && $bmi<39.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖II期",
                "standard"=>"34.9~39.9",
                "value"=>$bmi,
            );
        }
        else if($bmi>39.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖II期",
                "standard"=>"大于39.9",
                "value"=>$bmi,
            );
        }
        if($param["hip"]!=false && $param["waistline"]!=false){
            //$data["hip_waistline"]=sprintf("%0.2f",floatval($param["waistline"])/floatval($param["hip"]));
        }
        if($param["sex"] == 0 && $param["waistline"]>85 || $param["sex"] == 1 && $param["waistline"]>80){
            $data[]=array(
                "label"=>"腰围",
                "desc"=>"潜在向心型肥胖",
                "standard"=>"男>85cm,女>80cm",
                "value"=>$param["waistline"],
            );
        }
        return $data;
    }

}