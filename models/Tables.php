<?php


namespace Models;

use PDO;
class Tables
{

    public static function addTableRow(string $date_start, string $date_end, string $time_start, string $time_end, int $hoved, int $junior, int $aspirant, string $description)
    {
        $stmt = Database::get()->prepare('INSERT INTO terminliste(date_start, date_end, time_start, time_end, hoved, junior, aspirant, description) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        try {
            $stmt->execute (
                [
                    $date_start,
                    $date_end,
                    $time_start,
                    $time_end,
                    $hoved,
                    $junior,
                    $aspirant,
                    $description
                ]
            );
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }


    public static function deleteRow()
    {



    }


}