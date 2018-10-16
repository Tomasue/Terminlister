<?php

namespace Models;

class Groups
{

    public static function registerGroup(string $name, string $description)
    {
        if (empty($name) && empty($description)) {
            return null;
        }

        if (isset($name) && isset($description)) {
           $stmt = Database::get()->prepare('INSERT INTO groups(`name`, description) VALUES(?, ?)');
           try {
               $stmt->execute([
                   $name,
                   $description
               ]);
           } catch(\Exception $e) {
               // Handel error.
           }

        }
    }

    public static function addUsers()
    {
        // Create new db for groups user to further be used in getTable.
    }



}