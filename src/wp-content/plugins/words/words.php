<?php

/*
Plugin Name: Word DB Replacer
Plugin URI: http://wordpress.org/plugins/words/
Description: This plugin replaces some words with other words using access to DataBase.
Author: Rubén Núñez
Version: 3.3
Author URI: https://ma.tt/
*/

//Create a 5 length array of cool places name
$places = array(
    'Buenos Aires',
    'Córdoba',
    'La Plata',
    'Mar del Plata',
    'Mendoza');

//Create another 5 word length array of cool cars
$cars = array(
    'Ford',
    'Chevrolet',
    'Fiat',
    'Renault',
    'Peugeot');

function renym_wordpress_typo_fix($text){

    $words = selectData();
    foreach ($words as $result){
        $cars[] = $result->cars;
        $places[] = $result->places;
    }
    return str_replace($cars, $places, $text);
}


add_filter('the_content', 'renym_wordpress_typo_fix');

function createTable(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'damRuben';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        cars varchar(255) NOT NULL,
        places varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

add_action( 'plugins_loaded', 'createTable' );


function insertData(){
    global $wpdb, $cars, $places;
    $table_name = $wpdb->prefix . 'damRuben';
    $hasSomething = $wpdb->get_results( "SELECT * FROM $table_name" );
    if ( count($hasSomething) == 0 ) {
        for ($i = 0; $i < count($cars); $i++) {
            $wpdb->insert(
                $table_name,
                array(
                    'cars' => $cars[$i],
                    'places' => $places[$i]
                )
            );
        }
    }
}

add_action( 'plugins_loaded', 'insertData' );

function selectData(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'damRuben';
    $results = $wpdb->get_results( "SELECT * FROM $table_name" );
    return $results;
}

