<?php

for ($i = 1; $i <= 10; $i++) {
    if ($i == 9) break;
    if ($i == 4) continue;
    echo "<p>$i</p>";
}
