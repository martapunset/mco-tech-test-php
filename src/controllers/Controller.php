<?php
require_once("src\models\IngredientsModel.php");
require_once("src\models\PizzasModel.php");


class Controller
{

    public $view;
    public $pizzasModel;
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
        if (!$currentPizza) {
            $currentPizza = $this->pizzasModel->getPizzaById(1);
        }

        return $currentPizza;
    }
    function getPizzaByIdPrice($id)
    {

        $currentPizzaPrice = $this->pizzasModel->getPizzaByIdPrice($id);
        if (!$currentPizzaPrice) {
            $currentPizza = $this->pizzasModel->getPizzaById(1);
        }

        return $currentPizzaPrice;
    }
    function addIngredient($request)
    {

        $requestOK = $this->pizzasModel->addIngredient($request);
        if ($requestOK) {
            header("Location: index.php?");
        }

        //else {
        // $this->action = $request["action"];
        //  $this->error = "The data entered is incorrect, check that there is no other employee with that email.";

        //  } 
    }
    function deleteIngredient($request)
    {

        $requestOK = $this->pizzasModel->deleteIngredient($request);
        if ($requestOK) {
            header("Location: index.php?");
        }
    }
}
