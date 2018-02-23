<?php

include_once ROOT . '/components/Autoload.php';

class IndexController
{
    //Экшен главной страницы.

    public static function actionIndex()
    {

        require_once(ROOT . '/views/index.php');
        return true;
    }
}
