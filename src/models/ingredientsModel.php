<?php

require_once("config/db.php");

class IngredientsModel
{

    protected $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getAllIngredients()
    {

        $query = $this->db->connect()->prepare("SELECT id, name, price
        FROM ingredients");

        try {
            $query->execute();
            $ingredients = $query->fetchAll();
            return $ingredients;
        } catch (PDOException $e) {
            return [];
        }
    }
}
