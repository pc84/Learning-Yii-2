<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is my solution to the exercise received. Here I will explain every solution details.
    </p>
    <p>
        For the solution was used the MVC pattern, locating the logic in model, presentation in view and manage
        interaction with controller.
        For login first time you can use user "admin" with password "admin".

        The menu have:
        <ul>
            <li>Users: the main page, as requested, with the user grid.</li>
            <li>Chart: with a pie chart, that show percent by each Zip Code.</li>
            <li>About: with this informaton.</li>
            <li>Login or Logout link.</li>
        </ul>
    </p>
    <p>
        Source code is in https://github.com/pc84/Learning-Yii-2 as you can see every commit details.
        For database can import the sql file named "database.sql" in the root folder, or use migrations. In both
        case must create first the database "callapp".
    </p>
    <p>
        Resources used:
        <ul>
            <li>
                Added to composer "sjaakp/yii2-gcharts" for generate chart
            </li>
            <li>
                Added to composer "c006/yii2-migration-utility" for generate migrations
            </li>
        </ul>
    </p>
    <p>
        Another considerations:
        <ul>
            <li>Do not work on style with bootstraps because was not requested. I do exactly as requested.
                If you want to see another skills please let me know.
            </li>
            <li>I never worked before with yii, could be better the solution, i'm sure.</li>
            <li>I do not write comments, I like write "clean code" that explain it self.</li>
            <li>Please send me all suggestions, I would like to receive feedback.</li>
        </ul>
    </p>

</div>
