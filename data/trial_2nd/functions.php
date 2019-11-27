<?php

// postデータを取得
function get_post($key) {
    if(isset($_POST[$key])) {
        $var = trim($_POST[$key]);
        return $var;
    }
}