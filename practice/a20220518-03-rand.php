<?php

echo getrandmax() . "<br>"; // 2147483647
echo rand() . "<br>";
echo rand(1, 6) . "<br>";
echo rand(0, 16777215) . "<br>";
$c = rand(0, 16777215); // true colors

printf("#%'06X<br>", $c); // #00ABCD

# 這也是註解;
