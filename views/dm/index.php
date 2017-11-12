<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-11-11
 * Time: 下午6:47
 */

?>
<head>
    <style type="text/css">
        .dm-text{
            width: 40%;
        }
        .next{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .base-info{
            width: 60%;
        }
        .eating{
            width: 40%;
        }
    </style>
</head>
<body>
    <div>
        <p>请完成以下调查</p>
    </div>
    <div class="">
        <form>
            <p>1.是否确诊为糖尿病</p>
            <label><input name="is_dm" type="radio" value="" />是 </label>
            <label><input name="is_dm" type="radio" value="" />否 </label>
            <p>2.请录入血糖值</p>
            <label>空腹血糖(mmol/L):<input class="dm-text" name="is_dm" type="text" value="" /></label><br>
            <label>餐后血糖(mmol/L):<input class="dm-text" name="is_dm" type="text" value="" /></label><br>
            <label>任意时间血糖(mmol/L):<input class="dm-text" name="is_dm" type="text" value="" /></label><br>
            <label>3.确诊医院:<input class="dm-text" name="hospital_name" type="text" value="" /></label><br>
            <label>4.确诊时间:<input class="dm-text" name="check_time" type="text" value="" /></label><br>
            <button class="next">下一步（请完善基本信息）</button><br>
            <label>姓名:<input class="base-info" name="name" type="text" value="" /></label><br>
            <label>性别:<input class="base-info" name="sex" type="text" value="" /></label><br>
            <label>年龄:<input class="base-info" name="age" type="text" value="" /></label><br>
            <label>职业:<input class="base-info" name="work" type="text" value="" /></label><br>
            <label>身份证号:<input class="base-info" name="identify" type="text" value="" /></label><br>
            <label>电话:<input class="base-info" name="tel" type="text" value="" /></label><br>
            <label>身高(cm):<input class="base-info" name="height" type="text" value="" /></label><br>
            <label>体重(kg):<input class="base-info" name="weight" type="text" value="" /></label><br>
            <label>腰围(cm):<input class="base-info" name="waistline" type="text" value="" /></label><br>
            <label>臀围(cm):<input class="base-info" name="hip" type="text" value="" /></label><br>
            <p>体力劳动</p>
            <label><input class="work-type" name="work-type" type="radio" value="" />休息</label>
            <label><input class="work-type" name="work-type" type="radio" value="" />轻体力劳动</label>
            <label><input class="work-type" name="work-type" type="radio" value="" />中体力劳动</label>
            <label><input class="work-type" name="work-type" type="radio" value="" />重体力劳动</label><br>
            <label>主食(两):<input class="base-info" name="diet" type="text" value="" /></label><br>
            <p>副食</p>
            <label>蔬菜(两):<input class="eating" name="vegetables" type="text" value="" /></label><br>
            <label>牛奶(ml):<input class="eating" name="milk" type="text" value="" /></label><br>
            <label>鸡蛋(个):<input class="eating" name="egg" type="text" value="" /></label><br>
            <label>瘦肉(两):<input class="eating" name="meet" type="text" value="" /></label><br>
            <label>豆制品(两):<input class="eating" name="bean" type="text" value="" /></label><br>
            <label>烹调油(汤匙):<input class="eating" name="bean" type="text" value="" /></label><br>
            <label>运动方式:<input class="eating" name="sports_type" type="text" value="" /></label><br>
            <label>运动强度(心率次/分):<input class="eating" name="sports_intensity" type="text" value="" /></label><br>
            <label>运动时间(min):<input class="eating" name="sports_time" type="text" value="" /></label><br>
            <label>运动频率(次/周):<input class="eating" name="sports_frequency" type="text" value="" /></label><br>


        </form>
    </div>
</body>
