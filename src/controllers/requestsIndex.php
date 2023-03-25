<?php
$controller = new Controller();
$ingredients = $controller->getAllIngredients();

$pizzas=$controller->getAllPizzas();

$request = $_REQUEST;

if (isset($request["action"]) && $request["action"] == "addIngredient") {
  
    $controller->addIngredient($request);
}
if (isset($request["action"]) && $request["action"] == "deleteIngredient") {
   
    $controller->deleteIngredient($request);
}