<?php 
$a = 1;
while ($cart = mysqli_fetch_array($data['getCart'])) {
    echo $a;
    $a++;
}

?>