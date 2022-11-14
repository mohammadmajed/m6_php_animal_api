<?php
define('ANIMALS_API_URL', 'https://zoo-animal-api.herokuapp.com/animals/rand');
/**
 * HTU Redirect - redirects the request to another url. 
 *
 * @param String $path
 * @return void
 */


function animal_redirect($path)
{
    header("Location: $path");
    exit();
}

/**
 * Gets animals data from API or the Cache
 *
 * @return array
 */
function get_animals_data()
{
    $animals_array = array();
    $data_switch = false; // to switch between collecting data from the api or from the local data

    // we check if the data is already on the server (cached)
    if (!file_exists('./api_data/animals.json')) { // check if the file exists, if not, the file was not created yet
        $data_switch = true;
    } elseif (
        empty(json_decode(
            file_get_contents('./api_data/animals.json')
        ))
    ) {
        $data_switch = true;
    }

    // proceed and define the animals array based on the data_switch
    if ($data_switch) {
        for ($i = 0; $i < 20; $i++) {
            $animals_array[] = json_decode(file_get_contents(ANIMALS_API_URL));
        }
        file_put_contents('./api_data/animals.json', json_encode($animals_array)); // to cache API results
    } else {
        $animals_array = json_decode(
            file_get_contents('./api_data/animals.json')
        );
    }

    return $animals_array;
}