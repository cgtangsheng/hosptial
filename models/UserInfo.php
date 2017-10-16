<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $health_id
 * @property string $name
 * @property integer $sex
 * @property integer $age
 * @property string $work
 * @property integer $height
 * @property integer $weight
 * @property string $pressure
 * @property string $creat_time
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'age', 'height', 'weight'], 'integer'],
            [['creat_time'], 'safe'],
            [['name', 'work','identify','tel'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => '健康档案号',
            'name' => '姓名',
            'sex' => '性别',
            'age' => '年龄',
            'work' => '职业',
            'height' => '身高',
            'weight' => '体重',
            'creat_time' => '录入时间',
            'identify'=>'身份证号',
            'tel'=>'电话',
        ];
    }

    public function getUserInfo($health_id){
        return UserInfo::find()->where(['health_id'=>$health_id])->one();
    }
}
