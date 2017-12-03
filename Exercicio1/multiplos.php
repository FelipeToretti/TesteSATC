<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "Três Cinco<br>";
    } else if ($i % 3 == 0) {
        echo "Três<br>";
    } else if ($i % 5 == 0) {
        echo "Cinco<br>";
    } else {
        echo $i, "<br>";
    }
}
?>
