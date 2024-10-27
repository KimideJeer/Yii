<?php

use app\models\Bestelling;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\BestellingSearcher $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $medewerkerList */ // Ontvang de lijst van medewerkers

$this->title = 'Bestellings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bestelling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bestelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'medewerker_id',
                'label' => 'Medewerker',
                'value' => function ($model) {
                    return $model->medewerkers ? $model->medewerkers->naam : 'N/A'; // Zorg ervoor dat 'medewerkers' de juiste relatie is
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'medewerker_id',
                    $medewerkerList, // Gebruik de doorgegeven lijst
                    ['prompt' => 'Selecteer Medewerker', 'class' => 'form-control']
                ),
            ],
            'naam',
            'menu_id',
            'status',
            // //'timestamp',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Bestelling $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
