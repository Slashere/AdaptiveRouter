<?php

//Модель индекса на вывод количества сообщений.

class Index
{
    public static function getIndex()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id) as count FROM messages;');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $indexItem = $result->fetch();
        return $indexItem;
    }
}