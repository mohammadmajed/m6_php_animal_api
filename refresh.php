<?php

require './functions.php';

$animal_array = array();
for ($i = 0; $i < 20; $i++) {
    $animal_array[] = json_decode(file_get_contents(ANIMALS_API_URL));
}
file_put_contents('./api_data/animal.json', json_encode($animal_array));

animal_redirect('./home.php');