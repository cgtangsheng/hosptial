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

        return $this->render('check',[
        ]);
    }

    public function actionCheck(){

    }

}