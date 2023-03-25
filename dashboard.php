<?php
require_once "src/models/ingredientsModel.php";
require_once "src/models/PizzasModel.php";
require_once "src/controllers/Controller.php";
require_once "src/controllers/requestsDashboard.php";

//echo json_encode($currentPizza)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include("html\header.php"); ?>


    <main class="container text-center">
        <div class="row m-5  d-flex flex-wrap p-3  ">

            <div class="card m-5" style="width: 28rem;">
                <img src="https://www.lanacion.com.ar/resizer/P12DrdN140M2NuxBkxcBQvnYUEY=/1200x800/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/M7NX62ONAJGRHMGZQKL3UMOIG4.jpeg
  " class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">Pizza <?php echo $currentPizza[0]["pizza_name"]; ?></h5>
                    <p class="card-text">Your pizza base is Mozzarella, Tomato and Oregano </p>

                </div>
                <ul class="list-group list-group-flush">


                    <?php
                    if ($currentPizza) {
                        foreach ($currentPizza as $index => $ingredient) {

                            echo "<li class='list-group-item'>" . $ingredient["name"] . " " . $ingredient["price"] . "$    </li>";
                        }
                    }

                    if ($ingredientsById) {
                        foreach ($ingredientsById as $index => $ingredient) {

                            echo "<li class='list-group-item'> + " . $ingredient["name"] . " " . $ingredient["price"] . "      <a  href='?action=deleteIngredient&idIngredient=" . $ingredient["ingredient_Id"] . "&idPizza=" . $currentPizza[0]["pizza_Id"] . "'><i class='bi bi-trash'></i></a></li>";
                        }
                    } else {
                        echo "<li class='list-group-item'><h5>No extra ingredients added yet</h5></li>";
                    }
                    echo "<li class='list-group-item'> <h1>Total Price <span> " . $pizzaPrice . " $ </span></h1>   ";
                    ?>

                </ul>
                <div class="card-body">
                    <a class='btn btn-primary' href=''>Checkout</a></li>
                    <a id="home" class="btn btn-secondary" href="./">Back</a>
                </div>
            </div>


            <div class="m-5">
                <table class="table">
                    <h5 class="card-title">Add more ingredients to your base</h5>
                    <thead>
                        <tr>
                            <th class="tg-0pky">ID</th>
                            <th class="tg-0pky">Name</th>
                            <th class="tg-0lax">Price</th>
                            <th class="tg-0lax">Add</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($ingredients) {
                            foreach ($ingredients as $index => $ingredient) {
                                echo "<tr>";
                                echo "<td class='tg-0lax'>" . $ingredient["id"] . "</td>";
                                echo "<td class='tg-0lax'>" . $ingredient["name"] . "</td>";
                                echo "<td class='tg-0lax'>" . $ingredient["price"] . " $</td>";
                                echo "<td colspan='2' class='tg-0lax'>
                            
    <a class='btn btn-secondary' href='?action=addIngredient&idIngredient=" . $ingredient["id"] . "&idPizza=" . $currentPizza[0]["pizza_Id"] . "'>Add</a>
   
    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='tg-0lax'>Error loading ingredients</td></tr>";
                        }


                        ?>
                    </tbody>
                </table>
            </div>


        </div>
    </main>

</body>

</html>