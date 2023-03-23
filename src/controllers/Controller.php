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

    function getAllProducts()
    {

        $ingredients = $this->ingredientsModel->getAllIngredients();

        return $ingredients;
    }

    function getAllPizzas()
    {

        $pizzas = $this->pizzasModel->getAllPizzas();

        return $pizzas;
    }
    function getPizzasById($id)
    {

        $currentPizza = $this->pizzasModel->getPizzasById($id);

        return $currentPizza;
    }
}
