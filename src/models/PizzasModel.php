<?php
function getAllPizzas()
    {  
        $pdo=connect();
        $query = $pdo->prepare("SELECT p.id, p.pizza_name, p.price, i.price, i.name
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
        $pdo=connect();
        $query = $pdo->prepare("SELECT i.price, i.name, i.id
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