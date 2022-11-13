<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    


<?php
$animals = json_decode(file_get_contents('./api_data/animal.json'));

?>
<main class="container my-5">
    <h1 class="text-center">All Animals</h1>
    <hr class="w-100 mb-5">
    <div class="row">

        <?php foreach ($animals as $animal) : ?>

            <div class="animal-wrapper col-xl-3 mb-5">
                <div class="card w-100">
                    <img src="<?= $animal->image_link ?>" class="card-img-top" alt="animal_info" height="300px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $animal->name?>
                        </h5>
                        <p class="card-text">
                            <?= $animal->animal_type ?>
                        </p>
                        <p class="card-text">
                            <?= $animal->diet ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</main>

</body>
</html>
