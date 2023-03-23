<?php

require("config/db.php");
function get()
    {  
        $pdo=connect();
        $query = $pdo->prepare("SELECT id, name, price
        FROM ingredients");

        try {
            $query->execute();
            $ingredients = $query->fetchAll();
            return $ingredients;
        } catch (PDOException $e) {
            return [];
        }
    }