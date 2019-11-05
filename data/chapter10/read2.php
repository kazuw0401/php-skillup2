<?php

$file = file('access.log');

foreach($file as $line) {
    echo '<p>'.$line.'</p>';
}