<?php

$count = $_GET['count'];

echo "You sent me the value $count";

?>

<a href="counter.php?count=<?= $count ?>">Return</a>