<?php
if ($data[0]['id'] == null) {
    echo "Nothing was found :(";
} else {
    foreach ($data as $item) {
        echo "<a href=\"/movie/show/id/" . $item['id'] . " \" >" . $item['title'] . ',  ' . $item['year'] . "</a>" . "<br>";
    }
}



