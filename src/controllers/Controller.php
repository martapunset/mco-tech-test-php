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
    function addIngredient($request)
    {

        $requestOK = $this->pizzasModel->addIngredient($request);
        //$currentPizza = $this->pizzasModel->getPizzasById($request["idPizza"]);


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
