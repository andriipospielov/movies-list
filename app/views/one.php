<?php
foreach ($data[0] as $index => $item) {
    echo $index. ': '. $item. '<br>';
}
echo "<a href=\"/movie/destroy/id/". $data[0]['id']." \". >DELETE ITEM</a>";
?>

