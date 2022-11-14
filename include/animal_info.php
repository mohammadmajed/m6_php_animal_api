<?php
$animal_id = !empty($_GET['id']) ? $_GET['id'] : null;

if (!empty($animal_id)) :


    $animals = json_decode(file_get_contents('./api_data/animal.json'));

    $animal = array_filter($animals, function ($item) use ($animal_id) {
        return $item->id == $animal_id;
    });
    $animal = $animal[array_key_first($animal)];
?>

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col">
                <img src="<?= $animal->image_link ?>" alt="animal full detales" width="500px" height="500px">
            </div>
            <div class="col">
                <h2>
                    <?= $animal->name ?>
                </h2>
                <p>
                    <?="latin_name:". $animal->latin_name ?>
                </p>
                <p>
                    <?="animal_type: ". $animal->animal_type ?>
                </p>
                <p>
                    <?= "active_time: ".$animal->active_time ?>
                </p>
                <p>
                    <?= "length_min: ".$animal->length_min ?>
                </p>
                <p>
                    <?= "length_max: ".$animal->length_max ?>
                </p>
                <p>
                    <?= "weight_min: ".$animal-> weight_min?>
                </p>
                <p>
                    <?= "weight_min: ".$animal->weight_min?>
                </p>
                <p>
                    <?= "lifespan: ".$animal-> lifespan?>
                </p>
                <p>
                    <?= "habitat: ".$animal->habitat ?>
                </p>
                <p>
                    <?= "diet: ".$animal->diet ?>
                </p>
                <p>
                    <?= "geo_range: ".$animal->geo_range ?>
                </p>
                
            </div>
        </div>
    </div>  
<?php
endif;
?>