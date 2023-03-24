<?php


class PizzasModel
{

    protected $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getAllPizzas()
    {
      
        $query = $this->db->connect()->prepare("SELECT id, pizza_name, price, description
        FROM pizzas");

        try {
            $query->execute();
            $pizzas = $query->fetchAll();
            return $pizzas;
        } catch (PDOException $e) {
            return [];
        }
    }
    function getPizzaById($id)
    {
        $query = $this->db->connect()->prepare("SELECT p.id AS pizza_Id, p.price AS pizza_price, p.description, p.pizza_name AS pizza_name, i.price, i.name, i.id AS ingredient_Id
        FROM pizzas p 
        JOIN pizza_ingredients pi ON p.id = pi.pizza_id
        JOIN ingredients i ON pi.ingredient_id = i.id
        WHERE p.id = $id");

        try {
            $query->execute();
            $pizzas = $query->fetchAll();
            return $pizzas;
        } catch (PDOException $e) {
            return false;
        }
    }

    function getIngredientsById($id)
    {
        $query = $this->db->connect()->prepare("SELECT i.price, i.name, i.id as ingredient_Id
        FROM pizzas p 
         JOIN pizza_extra_ingredients pi ON p.id = pi.pizza_id
        JOIN ingredients i ON pi.ingredient_id = i.id
        WHERE p.id = $id");

        try {
            $query->execute();
            $pizzas = $query->fetchAll();
            return $pizzas;
        } catch (PDOException $e) {
            return false;
        }
    }
    function getPizzaByIdPrice($id)
    {  
        $query = $this->db->connect()->prepare(" SELECT CAST(SUM(i.price)+ 0.5*SUM(i.price) + p.price AS DECIMAL(10,2)) AS total_price
        FROM pizzas p 
        JOIN pizza_extra_ingredients pi ON p.id = pi.pizza_id
        JOIN ingredients i ON pi.ingredient_id = i.id
        WHERE p.id = $id;");

        try {
            $query->execute();
            $pizzaPrice = $query->fetch();
            return $pizzaPrice[0];
        } catch (PDOException $e) {
            return false;
        }
       
    }
    

    function addIngredient($request)
    {
        $pizza_id = $request["idPizza"];
        $ingredient_id= $request["idIngredient"];
       
        $query = $this->db->connect()->prepare(" INSERT INTO pizza_extra_ingredients (pizza_id, ingredient_id) 
        VALUES('$pizza_id', '$ingredient_id');");
    
        try {
            $query->execute();
           
            return [true];
        } catch (PDOException $e) {
            echo $e;
            return [false, $e];
        }
        
    }
    
    function deleteIngredient($request)
    {
        $pizza_id = $request["idPizza"];
        $ingredient_id= $request["idIngredient"];
        
        $query = $this->db->connect()->prepare("DELETE FROM pizza_extra_ingredients WHERE pizza_id = $pizza_id AND ingredient_id = $ingredient_id");
        try {
            $query->execute();
            echo "working delete";
            return [true];
        } catch (PDOException $e) {
            echo $e;
            return [false, $e];
        }
    }

}

