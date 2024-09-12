<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


/**
 * CountryController implements the CRUD actions for country model.
 * Code by Kimi
 */

class ExampleController extends Controller
{
  public function actionSay($message = 'Kimi')
  {
    echo "Hello $message";
    exit;
  }
}