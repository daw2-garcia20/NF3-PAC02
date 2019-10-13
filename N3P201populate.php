<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'comicsite') or die(mysqli_error($db));

// insert data into the comic table
$query = 'INSERT INTO comic
        (comic_id, comic_name, comic_type, comic_year, comic_leadcaracther,
        comic_creator)
    VALUES
        (1, "Mortadelo y filemon", 5, 1996, 1, 2),
        (2, "SuperLopez", 5, 2001, 4, 3),
        (3, "Zipi y Zape", 5, 2019, 5, 6),
        (4, "Geronimo y Stilton", 5, 2002, 7, 8),
        (5, "Capitan Calçotets", 5, 2011, 9, 10)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the comictype table
$query = 'INSERT INTO comictype 
        (comictype_id, comictype_label)
    VALUES 
        (1,"Sci Fi"),
        (2, "Drama"), 
        (3, "Adventure"),
        (4, "War"), 
        (5, "Humor"),
        (6, "Horror"),
        (7, "Action"),
        (8, "Kids")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the gente table
$query  = 'INSERT INTO gente
        (gente_id, gente_fullname, gente_iscaracther, gente_iscreator)
    VALUES
        (1, "Mortadelo", 1, 0),
        (2, "Francisco Ibáñez", 0, 1),
        (3, "Juan López Fernández", 0, 1),
        (4, "Lopez", 1, 0),
        (5, "Zipi", 1, 0),
        (6, "Josep Escobar i Saliente", 0, 1),
        (7, "Elisabetta Dami", 0, 1),
        (8, "Geronimo Stilton", 0, 1),
        (9, "Dav Pilkey", 0, 1),
        (10, "Capita", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>
