<?php

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