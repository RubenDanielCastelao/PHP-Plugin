<?php

/*
Plugin Name: Word Randomizer
Plugin URI: http://wordpress.org/plugins/words/
Description: This plugin replaces some words with other words.
Author: Rubén Núñez
Version: 3.3
Author URI: https://ma.tt/
*/

function renym_wordpress_typo_fix($text)
{
    //Create a 5 length array of cool places name
    $places = array(
        'Buenos Aires',
        'Córdoba',
        'La Plata',
        'Mar del Plata',
        'Mendoza');

    //Randomize the order of the places array
    shuffle($places);

    //Create another 5 word length array of cool cars
    $cars = array(
        'Ford',
        'Chevrolet',
        'Fiat',
        'Renault',
        'Peugeot');


    return str_replace($places, $cars, $text);
}

add_filter('the_content', 'renym_wordpress_typo_fix');