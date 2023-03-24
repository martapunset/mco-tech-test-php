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
      
        $query = $this->db->connect()->prepare("SELECT p.id, p.pizza_name, p.price, i.price, i.name
        FROM pizzas p
        JOIN pizza_ingredients pi ON p.id = pi.pizza_id
        JOIN ingredients i ON pi.ingredient_id = i.id");

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
        $query = $this->db->connect()->prepare("SELECT p.id as pizza_Id, p.pizza_name, i.price, i.name, i.id as ingredient_Id
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
    function getPizzaByIdPrice($id)
    {  
        $query = $this->db->connect()->prepare(" SELECT SUM(i.price) + p.price AS total_price
        FROM pizzas p 
        JOIN pizza_ingredients pi ON p.id = pi.pizza_id
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
       
        $query = $this->db->connect()->prepare(" INSERT INTO pizza_ingredients (pizza_id, ingredient_id) 
        VALUES('$pizza_id', '$ingredient_id');");
    
        try {
            $query->execute();
            echo "working add";
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
        
        $query = $this->db->connect()->prepare("DELETE FROM pizza_ingredients WHERE pizza_id = $pizza_id AND ingredient_id = $ingredient_id");
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

