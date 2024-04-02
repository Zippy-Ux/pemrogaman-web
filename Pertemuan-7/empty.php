<?php

$myArray = array();
if (empty($myArray)) {
    echo "Array tidak terdefinisikan atau kosong.";
} else {
    echo "Array tidak terdefinisikan dan tidak kosong.";
}

echo "<br>";

if (empty($nonExistentVar)) {
    echo "Array tidak terdefinisikan atau kosong.";
} else {
    echo "Array tidak terdefinisikan dan tidak kosong.";
}
?>