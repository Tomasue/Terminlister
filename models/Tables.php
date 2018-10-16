<?php


namespace Models;

use PDO;
class Tables
{

    public static function addTableRow(string $date_start, string $date_end, string $time_start, string $time_end, string $event_description)
    {
        Database::get()->prepare('INSERT INTO tables(date_start, date_end, time_start, time_end, event_description) VALUES(?, ?, ?, ?, ?)')->execute(
            [
                $date_start,
                $date_end,
                $time_start,
                $time_end,
                $event_description
            ]
        );

    }


    public static function deleteRow()
    {



    }


}