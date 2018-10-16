<?php

namespace Library;

class Config extends DataManager
{

    public static function getAll()
    {
        return self::getData();
    }

    protected static function onOpen()
    {
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../config.json');
        self::setData(json_decode($data));
    }

    protected static function onClose()
    {
        $data = json_encode(self::getData(), JSON_PRETTY_PRINT);
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/../config.json', $data);
    }

}
