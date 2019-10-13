<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'comicsite') or die(mysqli_error($db));

// select the comic titles and their genre after 1995 (to show all cause my oldest comic is from 1995)
$query = 'SELECT
        comic_name, comictype_label
    FROM
        comic LEFT JOIN comictype ON comic_type = comictype_id
    WHERE
        comic.comic_type = comictype.comictype_id AND
        comic_year > 1995
    ORDER BY
        comic_type';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
