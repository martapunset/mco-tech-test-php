<?php

$controller = new Controller();
$ingredients = $controller->getAllIngredients();
$request = $_REQUEST;

if (isset($request["action"]) && $request["action"] == "getPizza") {
    $id= $request["pizza_id"];
    $currentPizza = $controller->getPizzaById($id);
    $defaultIngredients=$controller->getDefaultIngredients($id);
    $ingredientsById=$controller->getIngredientsById($id);
   
}  

if (isset($request["action"]) && $request["action"] == "addIngredient") {
   
    $controller->addIngredient($request);
}

if (isset($request["action"]) && $request["action"] == "deleteIngredient") {
   
    $controller->deleteIngredient($request);
}