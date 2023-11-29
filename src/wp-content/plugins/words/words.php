<?php

/*
Plugin Name: Word DB Replacer
Plugin URI: http://wordpress.org/plugins/words/
Description: This plugin replaces some words with other words using access to DataBase.
Author: Rubén Núñez
Version: 3.3
Author URI: https://ma.tt/
*/

function myplugin_update_db_check() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'damRuben';

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        PRIMARY KEY (id)
    )$charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    $name='Rubén';
    $text='Prueba de inserción con DB';

    $result = $wpdb->insert(
        $table_name,
        array(
            'time' => current_time( 'mysql' ),
            'name' => $name,
            'text' => $text,
        )
    );

    error_log("Comprobar inserción: " . $result);
}

add_action( 'plugins_loaded', 'myplugin_update_db_check' );


function renym_wordpress_typo_fix( $text ) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'damRuben';

    $resultado = $wpdb->get_results("SELECT * FROM " . $table_name, ARRAY_A);

    foreach($resultado as $fila)
    {
        error_log("Recorremos resultado: " . $fila['time']);
    }

    return str_replace( 'WordPressPlugin', $resultado , $text );
}

add_filter( 'the_content', 'renym_wordpress_typo_fix' );

