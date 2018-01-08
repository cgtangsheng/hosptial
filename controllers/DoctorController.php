<?php

namespace app\controllers;

class DoctorController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

}
