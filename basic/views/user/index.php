<?php

use \yii\helpers\Html;
use \yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Call App';
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $users,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'first_name',
            'last_name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
