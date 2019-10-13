<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS comicsite';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'comicsite') or die(mysqli_error($db));

//create the comic table
$query = 'CREATE TABLE comic (
        comic_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        comic_name      VARCHAR(255)      NOT NULL, 
        comic_type      TINYINT           NOT NULL DEFAULT 0, 
        comic_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        comic_leadcaracther INTEGER UNSIGNED  NOT NULL DEFAULT 0, 
        comic_creator  INTEGER UNSIGNED  NOT NULL DEFAULT 0, 

        PRIMARY KEY (comic_id),
        KEY comic_type (comic_type, comic_year) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the comictype table
$query = 'CREATE TABLE comictype ( 
        comictype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        comictype_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (comictype_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the gente table
$query = 'CREATE TABLE gente ( 
        gente_id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        gente_fullname   VARCHAR(255)        NOT NULL, 
        gente_iscaracther    TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        gente_iscreator TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 

        PRIMARY KEY (gente_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Comic database successfully created!';
?>
