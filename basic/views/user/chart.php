<?php

use yii\helpers\Html;
use sjaakp\gcharts\PieChart;

$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= PieChart::widget([
        'height' => '400px',
        'dataProvider' => $dataProvider,
        'columns' => [
            'zip:string',
            'countSameZip',
        ],
        'options' => [
            'title' => 'Zip code distribution in users'
        ],
    ]) ?>

</div>
