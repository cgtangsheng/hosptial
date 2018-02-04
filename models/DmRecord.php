<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_record".
 *
 * @property integer $health_id
 * @property integer $is_diabetes
 * @property double $fasting_blood_glucose
 * @property double $postprandial_blood_glucose
 * @property double $anytime_blood_glucose
 * @property integer $diabetes_type
 * @property integer $is_ketoacidosis
 * @property integer $ketoacidosis_frequency
 * @property string $ketoacidosis_reason
 * @property integer $is_hypoglycemia
 * @property integer $hypoglycemia_frequency
 * @property string $hypoglycemia_reason
 * @property integer $hypoglycemia_Severity
 * @property integer $is_cerebrovascular
 * @property integer $is_cardiovascular
 * @property integer $is_peripheral_vascular
 * @property integer $is_nephrosis
 * @property integer $is_fundus_lesions
 * @property integer $is_peripheral_neuropathy
 * @property integer $is_diabetic_foot
 * @property string $associated_diseases
 * @property integer $work_density
 * @property double $diet
 * @property double $vegetables
 * @property double $milk
 * @property integer $egg
 * @property double $meet
 * @property double $bean
 * @property double $oil
 * @property double $salt
 * @property integer $sports_type
 * @property integer $sports_intensity
 * @property integer $sports_time
 * @property integer $sports_frequency
 * @property integer $is_smoke
 * @property integer $smoke_num
 * @property integer $is_drink
 * @property integer $drink_num
 * @property integer $high_blood_pressure
 * @property integer $low_blood_pressure
 * @property integer $blood_pressure_addr
 * @property double $blood_sugar_2
 * @property double $hbalc
 * @property double $tg
 * @property double $ldl_c
 * @property double $hdl_c
 */
class DmRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id', 'is_diabetes', 'diabetes_type', 'is_ketoacidosis', 'ketoacidosis_frequency', 'is_hypoglycemia', 'hypoglycemia_frequency', 'hypoglycemia_Severity', 'is_cerebrovascular', 'is_cardiovascular', 'is_peripheral_vascular', 'is_nephrosis', 'is_fundus_lesions', 'is_peripheral_neuropathy', 'is_diabetic_foot', 'work_density', 'egg', 'sports_type', 'sports_intensity', 'sports_time', 'sports_frequency', 'is_smoke', 'smoke_num', 'is_drink', 'drink_num', 'high_blood_pressure', 'low_blood_pressure', 'blood_pressure_addr'], 'integer'],
            [['fasting_blood_glucose', 'postprandial_blood_glucose', 'anytime_blood_glucose', 'diet', 'vegetables', 'milk', 'meet', 'bean', 'oil', 'salt', 'blood_sugar_2', 'hbalc', 'tg', 'ldl_c', 'hdl_c'], 'number'],
            [['ketoacidosis_reason', 'hypoglycemia_reason', 'associated_diseases'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'is_diabetes' => 'Is Diabetes',
            'fasting_blood_glucose' => 'Fasting Blood Glucose',
            'postprandial_blood_glucose' => 'Postprandial Blood Glucose',
            'anytime_blood_glucose' => 'Anytime Blood Glucose',
            'diabetes_type' => 'Diabetes Type',
            'is_ketoacidosis' => 'Is Ketoacidosis',
            'ketoacidosis_frequency' => 'Ketoacidosis Frequency',
            'ketoacidosis_reason' => 'Ketoacidosis Reason',
            'is_hypoglycemia' => 'Is Hypoglycemia',
            'hypoglycemia_frequency' => 'Hypoglycemia Frequency',
            'hypoglycemia_reason' => 'Hypoglycemia Reason',
            'hypoglycemia_Severity' => 'Hypoglycemia  Severity',
            'is_cerebrovascular' => 'Is Cerebrovascular',
            'is_cardiovascular' => 'Is Cardiovascular',
            'is_peripheral_vascular' => 'Is Peripheral Vascular',
            'is_nephrosis' => 'Is Nephrosis',
            'is_fundus_lesions' => 'Is Fundus Lesions',
            'is_peripheral_neuropathy' => 'Is Peripheral Neuropathy',
            'is_diabetic_foot' => 'Is Diabetic Foot',
            'associated_diseases' => 'Associated Diseases',
            'work_density' => 'Work Density',
            'diet' => 'Diet',
            'vegetables' => 'Vegetables',
            'milk' => 'Milk',
            'egg' => 'Egg',
            'meet' => 'Meet',
            'bean' => 'Bean',
            'oil' => 'Oil',
            'salt' => 'Salt',
            'sports_type' => 'Sports Type',
            'sports_intensity' => 'Sports Intensity',
            'sports_time' => 'Sports Time',
            'sports_frequency' => 'Sports Frequency',
            'is_smoke' => 'Is Smoke',
            'smoke_num' => 'Smoke Num',
            'is_drink' => 'Is Drink',
            'drink_num' => 'Drink Num',
            'high_blood_pressure' => 'High Blood Pressure',
            'low_blood_pressure' => 'Low Blood Pressure',
            'blood_pressure_addr' => 'Blood Pressure Addr',
            'blood_sugar_2' => 'Blood Sugar 2',
            'hbalc' => 'Hbalc',
            'tg' => 'Tg',
            'ldl_c' => 'Ldl C',
            'hdl_c' => 'Hdl C',
        ];
    }

    public function checkDietInfo($param){
        $data = array();
        $diet_desc = array();
        if(isset($param["work_density"])){
            switch ($param["work_density"]){
                case 0:
                    if(isset($param["diet"])&&$param["diet"]>5){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"轻体力劳动每日摄入标准4~5两",
                            "value"=>$param["diet"],
                        );
                    }
                    break;
                case 1:
                    if(isset($param["diet"])&&$param["diet"]>6){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"轻体力劳动每日摄入标准5~6两",
                            "value"=>$param["diet"],
                        );
                    }
                    break;
                case 2:
                    if(isset($param["diet"])&&$param["diet"]>8){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"中体力劳动每日摄入标准6~8两",
                            "value"=>$param["diet"],

                        );
                    }
                    break;
            }
        }
        if(isset($param["vegetables"])&&$param["vegetables"]<10){
            $diet_desc[]=array(
                "label"=>"蔬菜",
                "desc"=>"蔬菜摄入太少",
                "standard"=>"一市斤以上",
                "value"=>$param["vegetables"],
            );
        }
        if(isset($param["milk"])&&$param["milk"]<250){
            $diet_desc[]=array(
                "label"=>"牛奶",
                "desc"=>"牛奶摄入太少",
                "standard"=>"250ml",
                "value"=>$param["milk"],
            );
        }
        if(isset($param["egg"])&&$param["egg"]<1){
            $diet_desc[]=array(
                "label"=>"蛋类",
                "desc"=>"蛋类摄入太少",
                "standard"=>"1个",
                "value"=>$param["egg"],
            );
        }
        if(isset($param["meet"])&&$param["meet"]!=false&&$param["meet"]<2){
            $diet_desc[]=array(
                "label"=>"瘦肉",
                "desc"=>"瘦肉摄入太少",
                "standard"=>"2两",
                "value"=>$param["meet"],
            );
        }
        if(isset($param["bean"])&&$param["bean"]!=false&&$param["bean"]<1){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太少",
                "standard"=>"1~2两",
                "value"=>$param["bean"],
            );
        }elseif(isset($param["bean"])&&$param["bean"]>2){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>$param["bean"],
            );
        }
        if(isset($param["oil"])&&$param["oil"]>3){
            $diet_desc[]=array(
                "label"=>"食用油",
                "desc"=>"食用油摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>$param["oil"],
            );
        }
        if(isset($param["salt"])&&$param["salt"]>6){
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
        if(isset($param["height"])&&isset($param["weight"])&&$param["height"]!=false && $param["weight"]!=false){
            $bmi=sprintf("%0.2f",floatval($param["weight"])/floatval($param["height"])*100);
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
        if(isset($param["hip"])&&$param["hip"]!=false && $param["waistline"]!=false){
            //$data["hip_waistline"]=sprintf("%0.2f",floatval($param["waistline"])/floatval($param["hip"]));
        }
        if(isset($param["sex"])&&isset($param["waistline"])&&(isset($param["sex"])&&$param["sex"] == 0 && $param["waistline"]>85) || (isset($param["sex"])&&$param["sex"] == 1 && $param["waistline"]>80)){
            $data[]=array(
                "label"=>"腰围",
                "desc"=>"潜在向心型肥胖",
                "standard"=>"男>85cm,女>80cm",
                "value"=>$param["waistline"],
            );
        }
        return $data;
    }

    public function checkGluCoseInfo($param){
        $data = array();
        if(isset($param["fasting_blood_glucose"])&&$param["fasting_blood_glucose"]>0){
            if($param["fasting_blood_glucose"]>7.2){
                $data[]=array(
                    "label"=>"空腹血糖",
                    "desc"=>"血糖偏高",
                    "value"=>$this->floatParam($param,"fasting_blood_glucose"),
                    "standard"=>"18~22.9"
                );
            }else if (isset($param["fasting_blood_glucose"])&&$param["fasting_blood_glucose"]<3.9){
                $data[]=array(
                    "label"=>"空腹血糖",
                    "desc"=>"血糖偏低",
                    "value"=>$this->floatParam($param,"fasting_blood_glucose"),
                    "standard"=>"18~22.9"
                );
            }else if(isset($param["fasting_blood_glucose"])&&$param["fasting_blood_glucose"]>10){
                $data[]=array(
                    "label"=>"餐后血糖",
                    "desc"=>"血糖偏高",
                    "value"=>$this->floatParam($param,"fasting_blood_glucose"),
                    "standard"=>"18~22.9"
                );
            }
        }
        if(isset($param["hbalc"])&&$param["hbalc"]>7){
            $data[]=array(
                "label"=>"餐后血糖",
                "desc"=>"血糖偏高",
                "value"=>$this->floatParam($param["hbalc"]),
                "standard"=>"<7.0"
            );
        }
        if(isset($param["high_blood_pressure"])&&$param["high_blood_pressure"]>130){
            $data[]=array(
                "label"=>"血压高压",
                "desc"=>"高压偏高",
                "value"=>$this->intParam($param,"high_blood_pressure"),
                "standard"=>"<130"
            );
        }
        if(isset($param["low_blood_pressure"])&&$param["low_blood_pressure"]>130){
            $data[]=array(
                "label"=>"低压高压",
                "desc"=>"低压偏低",
                "value"=>$this->intParam($param,"low_blood_pressure"),
                "standard"=>"<80"
            );
        }
        if(isset($param["hdl_c"])&&$param["hdl_c"]>1 && (isset($param["sex"]) &&$param["sex"]==0) ||  (isset($param["sex"])&&$param["sex"]==1 && $param["hdl_c"]>1.3)){
            $data[]=array(
                "label"=>"hdl_c",
                "desc"=>"偏低",
                "value"=>$this->floatParam($param,"hdl_c"),
                "standard"=>"男性>1.0,女性>1.3"
            );
        }
        if(isset($param["tg"])&&$param["tg"]>1.7){
            $data[]=array(
                "label"=>"tg",
                "desc"=>"偏高",
                "value"=>$this->floatParam($param,"tg"),
                "standard"=>"<=1.7"
            );
        }
        if(isset($param["ldl_c"])&&$param["ldl_c"]>2.6){
            $data[]=array(
                "label"=>"ldl_c",
                "desc"=>"偏高",
                "value"=>$this->floatParam($param,"ldl_c"),
                "standard"=>"<=2.6"
            );
        }
        if(isset($param["sports_time"])&&$param["sports_time"]<150){
            $data[]=array(
                "label"=>"有氧运动",
                "desc"=>"有氧运动时间太少",
                "value"=>$this->floatParam($param,"sports_time"),
                "standard"=>">150分钟"
            );
        }
        return $data;
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
