<?php

namespace app\controllers;

use app\models\Bestelling;
use app\models\BestellingSearcher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Medewerker;
use app\models\Menu;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * BestellingController implements the CRUD actions for Bestelling model.
 */
class BestellingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Bestelling models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BestellingSearcher();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Haal medewerkers en menu's op
        $medewerkerList = ArrayHelper::map(Medewerker::find()->all(), 'id', 'naam');
        $menuList = ArrayHelper::map(Menu::find()->all(), 'id', 'naam'); // Zorg ervoor dat je dit hier hebt toegevoegd

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'medewerkerList' => $medewerkerList,
            'menuList' => $menuList, // Voeg dit toe
        ]);
    }

    /**
     * Displays a single Bestelling model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bestelling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bestelling();
        $medewerkers = Medewerker::find()->all();
        $menu = Menu::find()->all();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    
        return $this->render('create', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menu' => $menu,// Kimi de Jeer
        ]);
    }
    
    /**
     * Updates an existing Bestelling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $menu = Menu::find()->all();
        $medewerkers = Medewerker::find()->all(); // Kimi de Jeer

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menu' => $menu //Kimi de Jeer
        ]);
    }

    /**
     * Deletes an existing Bestelling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    

    /**
     * Finds the Bestelling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Bestelling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bestelling::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}