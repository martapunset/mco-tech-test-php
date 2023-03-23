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
    function update($request)
    {
      
            $currentPizza = $this->pizzasModel->update($request);
            return $currentPizza;

         //   if ($products[0]) {
           //     header("Location: index.php?controller=Admin&action=getAllProducts");
          ///  } else {
               // $this->action = $request["action"];
              //  $this->error = "The data entered is incorrect, check that there is no other employee with that email.";
               // $this->view->render("adminView/updateProduct");
     //    } else {
         //   $this->view->render("adminView/adminDashboard");
        //}
    }
}
