<?php
require_once "src/models/ingredientsModel.php";
require_once "src/models/PizzasModel.php";
require_once "src/controllers/Controller.php";
require_once "src/controllers/IndexRequests.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body class="">

    <?php include("html\header.php"); ?>
    <main class="row m-5 center justify-content-center">
        <div class="col-auto d-flex flex-wrap p-3  ">

            <!--------- card--------->

            <?php
            if ($pizzas) {
              
            foreach ($pizzas as $pizza) {

                echo '
            <div class="card m-3" style="width: 22rem;">
                <a href="dashboard.php?action=getPizza&pizza_id=' . $pizza["id"] . '"><img src="https://www.lanacion.com.ar/resizer/P12DrdN140M2NuxBkxcBQvnYUEY=/1200x800/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/M7NX62ONAJGRHMGZQKL3UMOIG4.jpeg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title">Pizza ' . $pizza["pizza_name"] . '</h5>
                    <p class="card-text">' . $pizza["description"] . '</p>
                
                </div>
                <ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"> <h3>Total Price <span> ' . $pizza["total_price"] . ' $ </span></h3></li>
                </ul>
                <div class="card-body">
                    <a href="dashboard.php?action=getPizza&pizza_id=' . $pizza["id"] . '"class="btn btn-secondary" href="">Order</a>
                </div>
            </div>';
            };
            }
            else{
                echo '<h1>There are no pizzas</h1>';
            }
            ?>

        </div>
    
    </main>
</body>

</html>