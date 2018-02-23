<?php

include_once ROOT . '/components/Autoload.php';

class VideoController
{
    //Экшен главной страницы.

    public static function actionIndex()
    {

        require_once(ROOT . '/views/video.php');
        return true;
    }
}
