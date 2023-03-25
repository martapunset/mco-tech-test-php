<?php
require_once("src\models\IngredientsModel.php");
require_once("src\models\PizzasModel.php");


class Controller
{

    protected $pizzasModel;
    protected $ingredientsModel;

    function __construct()
    {

        $this->ingredientsModel = new IngredientsModel();
        $this->pizzasModel = new PizzasModel();
    }


    function getAllIngredients()
    {
        $ingredients = $this->ingredientsModel->getAllIngredients();

        return $ingredients;
    }

    function getAllPizzas()
    {

        $pizzas = $this->pizzasModel->getAllPizzas();

        return $pizzas;
    }

    function getPizzaById($id)
    {

        $currentPizza = $this->pizzasModel->getPizzaById($id);
        // If the pizza doesn't exist, we return the first pizza
        if (!$currentPizza) {
            $currentPizza = $this->pizzasModel->getPizzaById(1);
        }

        return $currentPizza;
    }


    function addIngredient($request)
    {
        $requestOK = $this->pizzasModel->addIngredient($request);
        if ($requestOK) {
            header("Location: dashboard.php?action=getPizza&pizza_id=" . $request["idPizza"]);
        }
    }

    function deleteIngredient($request)
    {
        $requestOK = $this->pizzasModel->deleteIngredient($request);
        if ($requestOK) {
            header("Location: dashboard.php?action=getPizza&pizza_id=" . $request["idPizza"]);
        }
    }

   /* Returns the extra ingredients of a pizza */
    function getIngredientsById($id){
        $ingredients = $this->pizzasModel->getIngredientsById($id);
        return $ingredients;
    }
    function getDefaultIngredients($id){
        $defaultIngredients = $this->pizzasModel->getDefaultIngredientsById($id);
        return $defaultIngredients;
    }
}
