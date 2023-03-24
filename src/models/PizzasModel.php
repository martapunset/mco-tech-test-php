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
        //$pdo=connect();
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

    function getPizzasById($id)
    {
        // $pdo=connect();
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
            return [];
        }
    }
    
    

    function addIngredient($request)
    {
        $pizza_id = $request["idPizza"];
        $ingredient_id= $request["idIngredient"];
        
        //echo json_encode($request);
      //  return $request;

        $query = $this->db->connect()->prepare(" INSERT INTO pizza_ingredients (pizza_id, ingredient_id) 
        VALUES('$pizza_id', '$ingredient_id')");
    
        try {
            $query->execute();
            echo "working add";
            return [true];
        } catch (PDOException $e) {
            echo $e;
            return [false, $e];
        }
        
    }

}

