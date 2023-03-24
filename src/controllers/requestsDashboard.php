<?php

$controller = new Controller();
$ingredients = $controller->getAllIngredients();
$request = $_REQUEST;

if (isset($request["action"]) && $request["action"] == "getPizza") {
    $id= $request["pizza_id"];
    $currentPizza = $controller->getPizzaById($id);
    $ingredientsById=$controller->getIngredientsById($id);
 
    $pizzaPrice = $controller->getPizzaByIdPrice($currentPizza[0]["pizza_Id"]);

 /* when no extra ingredients added */
    if($pizzaPrice==0){

        $pizzaPrice=$currentPizza[0]["pizza_price"];
    }
}  


if (isset($request["action"]) && $request["action"] == "addIngredient") {
   
    $controller->addIngredient($request);
}

if (isset($request["action"]) && $request["action"] == "deleteIngredient") {
   
    $controller->deleteIngredient($request);
}