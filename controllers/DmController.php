<?php

namespace app\controllers;

use app\models\DmRecord;
use Yii;
use yii\rbac\DbManager;
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

    public function actionCreate(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect('/site/login');
        }
        $param = Yii::$app->request->queryParams;
        $param["health_id"]=Yii::$app->user->identity->getId();
        $result = array();

        $param["fasting_blood_glucose"] = $this->floatParam($param,"fasting_blood_glucose");
        $param["postprandial_blood_glucose"] = $this->floatParam($param,"postprandial_blood_glucose");
        $param["anytime_blood_glucose"]=$this->floatParam($param,"anytime_blood_glucose");
        $param["hypoglycemia_frequency"]=$this->floatParam($param,"hypoglycemia_frequency");
        $param["hypoglycemia_severity"]=$this->floatParam($param,"hypoglycemia_severity");
        $param["hypoglycemia_severity"]=$this->floatParam($param,"hypoglycemia_severity");
        $param["ketoacidosis_frequency"]=intval($param["ketoacidosis_frequency"]);
        $param["diet"]=$this->floatParam($param,"diet");
        $param["vegetables"]=$this->floatParam($param,"vegetables");
        $param["milk"]=$this->floatParam($param,"milk");
        $param["egg"]=intval($param["egg"]);
        $param["meet"]=$this->floatParam($param,"meet");
        $param["bean"]=$this->floatParam($param,"bean");
        $param["oil"]=$this->floatParam($param,"oil");
        $param["salt"]=$this->floatParam($param,"salt");
        $param["sports_intensity"]=$this->intParam($param,"sports_intensity");
        $param["sports_time"]=$this->intParam($param,"sports_time");
        $param["sports_frequency"]=$this->intParam($param,"sports_frequency");
        $param["smoke_num"]=$this->intParam($param,"smoke_num");

        $param["low_blood_pressure"]=$this->intParam($param,"low_blood_pressure");
        $param["blood_sugar_2"]=$this->floatParam($param,"blood_sugar_2");
        $param["ldl_c"]=$this->intParam($param,"ldl_c");
        $param["tg"]=$this->floatParam($param,"tg");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");
        $param["drink_num"]=$this->intParam($param,"drink_num");


        $param["hdl_c"]=$this->floatParam($param,"hdl_c");
        $sql = "insert into dm_record (health_id,is_diabetes,fasting_blood_glucose,
        postprandial_blood_glucose,anytime_blood_glucose,diabetes_type,is_ketoacidosis,
        ketoacidosis_frequency,ketoacidosis_reason,is_hypoglycemia,hypoglycemia_frequency,
        hypoglycemia_reason,hypoglycemia_severity,is_cerebrovascular,is_cardiovascular,
        is_peripheral_vascular,is_nephrosis,is_fundus_lesions,is_peripheral_neuropathy,
        is_diabetic_foot,associated_diseases,work_density,diet,vegetables,milk,egg,meet,bean,
        oil,salt,sports_type,sports_intensity,sports_time,sports_frequency,is_smoke,smoke_num,
        is_drink,drink_num,high_blood_pressure,low_blood_pressure,blood_pressure_addr,
        blood_sugar_2,hbalc,tg,ldl_c,hdl_c) values(:health_id,:is_diabetes,:fasting_blood_glucose,
        :postprandial_blood_glucose,:anytime_blood_glucose,:diabetes_type,:is_ketoacidosis,:ketoacidosis_frequency,
        :ketoacidosis_reason,:is_hypoglycemia,:hypoglycemia_frequency,:hypoglycemia_reason,
        :hypoglycemia_severity,:is_cerebrovascular,:is_cardiovascular,:is_peripheral_vascular,
        :is_nephrosis,:is_fundus_lesions,:is_peripheral_neuropathy,:is_diabetic_foot,:associated_diseases,
        :work_density,:diet,:vegetables,:milk,:egg,:meet,:bean,:oil,:salt,:sports_type,:sports_intensity,
        :sports_time,:sports_frequency,:is_smoke,:smoke_num,:is_drink,:drink_num,:high_blood_pressure,
        :low_blood_pressure,:blood_pressure_addr,:blood_sugar_2,:hbalc,:tg,:ldl_c,:hdl_c)";
        Yii::$app->db->createCommand($sql)
            ->bindParam(":health_id",$param["health_id"])
            ->bindParam(":is_diabetes",$param["is_diabetes"])
            ->bindParam(":fasting_blood_glucose",$param["fasting_blood_glucose"])
            ->bindParam(":postprandial_blood_glucose",$param["postprandial_blood_glucose"])
            ->bindParam(":anytime_blood_glucose",$param["anytime_blood_glucose"])
            ->bindParam(":diabetes_type",$param["diabetes_type"])
            ->bindParam(":is_ketoacidosis",$param["is_ketoacidosis"])
            ->bindParam(":ketoacidosis_frequency",$param["ketoacidosis_frequency"])
            ->bindParam(":ketoacidosis_reason",$param["ketoacidosis_reason"])
            ->bindParam(":is_hypoglycemia",$param["is_hypoglycemia"])
            ->bindParam(":hypoglycemia_frequency",$param["hypoglycemia_frequency"])
            ->bindParam(":hypoglycemia_reason",$param["hypoglycemia_reason"])
            ->bindParam(":hypoglycemia_severity",$param["hypoglycemia_severity"])
            ->bindParam(":is_cerebrovascular",$param["is_cerebrovascular"])
            ->bindParam(":is_cardiovascular",$param["is_cardiovascular"])
            ->bindParam(":is_peripheral_vascular",$param["is_peripheral_vascular"])
            ->bindParam(":is_nephrosis",$param["is_nephrosis"])
            ->bindParam(":is_fundus_lesions",$param["is_fundus_lesions"])
            ->bindParam(":is_peripheral_neuropathy",$param["is_peripheral_neuropathy"])
            ->bindParam(":is_diabetic_foot",$param["is_diabetic_foot"])
            ->bindParam(":associated_diseases",$param["associated_diseases"])
            ->bindParam(":work_density",$param["work_density"])
            ->bindParam(":diet",$param["diet"])
            ->bindParam(":vegetables",$param["vegetables"])
            ->bindParam(":milk",$param["milk"])
            ->bindParam(":egg",$param["egg"])
            ->bindParam(":meet",$param["meet"])
            ->bindParam(":bean",$param["bean"])
            ->bindParam(":oil",$param["oil"])
            ->bindParam(":salt",$param["salt"])
            ->bindParam(":sports_type",$param["sports_type"])
            ->bindParam(":sports_intensity",$param["sports_intensity"])
            ->bindParam(":sports_time",$param["sports_time"])
            ->bindParam(":sports_frequency",$param["sports_frequency"])
            ->bindParam(":is_smoke",$param["is_smoke"])
            ->bindParam(":smoke_num",$param["smoke_num"])
            ->bindParam(":is_drink",$param["is_drink"])
            ->bindParam(":drink_num",$param["drink_num"])
            ->bindParam(":high_blood_pressure",$param[":high_blood_pressure"])
            ->bindParam(":low_blood_pressure",$param["low_blood_pressure"])
            ->bindParam(":blood_pressure_addr",$param["blood_pressure_addr"])
            ->bindParam(":blood_sugar_2",$param["blood_sugar_2"])
            ->bindParam(":hbalc",$param["halc"])
            ->bindParam(":tg",$param["tg"])
            ->bindParam(":ldl_c",$param["ldl_c"])
            ->bindParam(":hdl_c",$param["hdl_c"])
           ->execute();
        $model = new DmRecord();
        //检查BMI指数
        $data = $model->checkBmiInfo($param);
        $result = array_merge($result,$data);
        //评估饮食状况
        $data = $model->checkDietInfo($param);
        $result = array_merge($result,$data);
        //评估糖尿病综合指标
        $data = $model->checkGluCoseInfo($param);
        $result = array_merge($result,$data);


        return $this->render('check',["data"=>$result]);
    }

    /**
     * Finds the Record model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Record the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCheck(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect('/site/login');
        }
        $param = Yii::$app->request->queryParams;
        $result = array();
        $model = new DmRecord();
        //检查BMI指数
        $data = $model->checkBmiInfo($param);
        $result = array_merge($result,$data);
        //评估饮食状况
        $data = $model->checkDietInfo($param);
        $result = array_merge($result,$data);

        $data = $model->checkGluCoseInfo($param);
        $result = array_merge($result,$data);

        return $this->render('check',["data"=>$result]);
    }

    private function floatParam($data,$index){
        if(!isset($data[$index])){
            return 0.0;
        }else{
            return floatval($data[$index]);
        }
    }
    private function intParam($data,$index){
        if(!isset($data[$index])){
            return 0;
        }else{
            return intval($data[$index]);
        }
    }

}