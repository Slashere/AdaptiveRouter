<?php

include_once ROOT . '/components/Autoload.php';

class ContactsController
{
    //Экшен главной страницы.

    public static function actionIndex()
    {

        require_once(ROOT . '/views/contacts.php');
        return true;
    }
}
