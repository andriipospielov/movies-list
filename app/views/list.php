<?php
foreach ($data as $item) {
    echo"<a href=\"/movie/show/id/".$item['id']." \" >". $item['title']. ',  ' . $item['year']."</a>". "<br>";
}



