<?php

include_once ROOT . '/components/Autoload.php';

class NewsController
{
    //Экшен главной страницы.

    public static function actionIndex()
    {

        require_once(ROOT . '/views/news.php');
        return true;
    }
}
